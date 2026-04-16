<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Get current user's cart
     */
    private function getCart()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())->first();
        } else {
            $sessionId = session()->getId();
            return Cart::where('session_id', $sessionId)->first();
        }
    }

    /**
     * Display checkout page
     */
    public function checkout()
    {
        $cart = $this->getCart();

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart')->with('error', 'سلة المشتريات فارغة');
        }

        return view('checkout', compact('cart'));
    }

    /**
     * Store new order
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
        'city' => 'required|string|max:100',
        'payment_method' => 'required|in:cod,card,bank_transfer',
    ]);

    // الحصول على السلة
    if (Auth::check()) {
        $cart = Cart::where('user_id', Auth::id())->first();
        $userId = Auth::id();
    } else {
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->first();
        $userId = null;  // للزوار غير المسجلين
    }

    if (!$cart || $cart->items->count() == 0) {
        return redirect()->route('cart')->with('error', 'سلة المشتريات فارغة');
    }

    $subtotal = $cart->total;
    $shipping = $subtotal > 500 ? 0 : 25;
    $total = $subtotal + $shipping;
    $orderNumber = 'ORD-' . strtoupper(uniqid());

    $order = Order::create([
        'order_number' => $orderNumber,
        'user_id' => $userId,  // يمكن أن يكون null للزوار
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'city' => $request->city,
        'subtotal' => $subtotal,
        'shipping_cost' => $shipping,
        'total' => $total,
        'payment_method' => $request->payment_method,
        'status' => 'pending',
        'notes' => $request->notes,
    ]);

    foreach ($cart->items as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'product_name' => $item->product->name,
            'quantity' => $item->quantity,
            'price' => $item->price,
        ]);
    }

    $cart->items()->delete();

    return redirect()->route('order.success', $order->id)
        ->with('success', 'تم إنشاء الطلب بنجاح');
}

    /**
     * Display order success page
     * SECURITY: Must verify ownership - users can only view their own orders
     */
    public function success($orderId)
    {
        // SECURITY: Require authentication for order success page
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يرجى تسجيل الدخول لعرض الطلب');
        }

        // SECURITY: Verify order belongs to current user
        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$order) {
            abort(404);
        }

        $order->load('items');

        return view('order-success', compact('order'));
    }

    /**
     * Display order details
     * SECURITY: Already protected with user_id check (line 109)
     */
    public function show($orderId)
    {
        $order = Order::with('items')
            ->where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('order-details', compact('order'));
    }

    /**
     * Display user's order history
     */
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('my-orders', compact('orders'));
    }
}
