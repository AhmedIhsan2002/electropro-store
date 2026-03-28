<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Get current user's cart (authenticated) or guest cart (session-based)
     */
    private function getCart()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => Auth::id(),
                ]);
            }
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            if (!$cart) {
                $cart = Cart::create([
                    'session_id' => $sessionId,
                ]);
            }
        }

        return $cart->load('items.product');
    }

    /**
     * Get the cart ID for ownership verification
     */
    private function getCurrentCartId()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            return $cart?->id;
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            return $cart?->id;
        }
    }

    /**
     * Verify cart item belongs to current user/guest
     */
    private function verifyCartItemOwnership(CartItem $cartItem): bool
    {
        $currentCartId = $this->getCurrentCartId();

        if (!$currentCartId) {
            return false;
        }

        return $cartItem->cart_id === $currentCartId;
    }

    /**
     * Display cart page
     */
    public function index()
    {
        $cart = $this->getCart();
        return view('cart', compact('cart'));
    }

    /**
     * Add product to cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check stock availability
        if ($product->stock_quantity < $request->quantity) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'الكمية المتوفرة غير كافية'
                ], 422);
            }
            return redirect()->back()->with('error', 'الكمية المتوفرة غير كافية');
        }

        $cart = $this->getCart();

        // Check if product already in cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Check total stock
            $newQuantity = $cartItem->quantity + $request->quantity;
            if ($product->stock_quantity < $newQuantity) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'الكمية المتوفرة غير كافية'
                    ], 422);
                }
                return redirect()->back()->with('error', 'الكمية المتوفرة غير كافية');
            }

            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم إضافة المنتج إلى السلة']);
        }

        return redirect()->back()->with('success', 'تم إضافة المنتج إلى السلة بنجاح');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $cartItem = CartItem::findOrFail($itemId);

        // SECURITY: Verify ownership
        if (!$this->verifyCartItemOwnership($cartItem)) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بتعديل هذه السلة'
                ], 403);
            }
            return redirect()->route('cart')->with('error', 'غير مصرح لك بتعديل هذه السلة');
        }

        // Check stock availability
        $product = $cartItem->product;
        if ($product && $product->stock_quantity < $request->quantity) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'الكمية المتوفرة غير كافية'
                ], 422);
            }
            return redirect()->back()->with('error', 'الكمية المتوفرة غير كافية');
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم تحديث الكمية بنجاح']);
        }

        return redirect()->back()->with('success', 'تم تحديث الكمية بنجاح');
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);

        // SECURITY: Verify ownership
        if (!$this->verifyCartItemOwnership($cartItem)) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذا المنتج'
                ], 403);
            }
            return redirect()->route('cart')->with('error', 'غير مصرح لك بحذف هذا المنتج');
        }

        $cartItem->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم حذف المنتج من السلة']);
        }

        return redirect()->back()->with('success', 'تم حذف المنتج من السلة');
    }

    /**
     * Clear entire cart
     */
    public function clear(Request $request)
    {
        $cart = $this->getCart();

        // SECURITY: Verify cart exists and belongs to user
        if (!$cart) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'السلة فارغة'
                ], 404);
            }
            return redirect()->route('cart');
        }

        $cart->items()->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم تفريغ السلة بنجاح']);
        }

        return redirect()->back()->with('success', 'تم تفريغ السلة بنجاح');
    }

    /**
     * Get cart item count for header display
     */
    public function getCartCount()
    {
        $cart = $this->getCart();
        return response()->json(['count' => $cart->total_items]);
    }
}