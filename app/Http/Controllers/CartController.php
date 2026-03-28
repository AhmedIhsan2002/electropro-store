<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // الحصول على السلة الحالية
    private function getCart()
    {
        if (Auth::check()) {
            // للمستخدم المسجل
            $cart = Cart::where('user_id', Auth::id())->first();
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => Auth::id(),
                ]);
            }
        } else {
            // للزائر غير المسجل (باستخدام Session)
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

    // عرض صفحة السلة
    public function index()
    {
        $cart = $this->getCart();
        return view('cart', compact('cart'));
    }

    // إضافة منتج إلى السلة
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = $this->getCart();

        // التحقق إذا كان المنتج موجود بالفعل في السلة
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // إذا موجود، نزيد الكمية
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // إذا غير موجود، نضيف جديد
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        }

        // إرجاع استجابة JSON إذا كان الطلب AJAX
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم إضافة المنتج إلى السلة']);
        }

        return redirect()->back()->with('success', 'تم إضافة المنتج إلى السلة بنجاح');
    }

    // تحديث كمية منتج في السلة
    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'تم تحديث الكمية بنجاح');
    }

    // حذف منتج من السلة
    public function remove($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return redirect()->back()->with('success', 'تم حذف المنتج من السلة');
    }

    // تفريغ السلة بالكامل
    public function clear()
    {
        $cart = $this->getCart();
        $cart->items()->delete();

        return redirect()->back()->with('success', 'تم تفريغ السلة بنجاح');
    }

    // عرض عدد المنتجات في السلة (للعرض في الشريط العلوي)
    public function getCartCount()
    {
        $cart = $this->getCart();
        return response()->json(['count' => $cart->total_items]);
    }
}
