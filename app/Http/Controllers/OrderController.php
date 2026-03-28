<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // عرض صفحة الدفع
    public function checkout()
    {
        // الحصول على السلة
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart')->with('error', 'سلة المشتريات فارغة');
        }

        return view('checkout', compact('cart'));
    }

    // إنشاء طلب جديد
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
        } else {
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
        }

        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart')->with('error', 'سلة المشتريات فارغة');
        }

        // حساب الإجمالي
        $subtotal = $cart->total;
        $shipping = $subtotal > 500 ? 0 : 25;
        $total = $subtotal + $shipping;

        // إنشاء رقم طلب فريد
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));

        // إنشاء الطلب
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => Auth::id(),
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

        // إضافة عناصر الطلب
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // تفريغ السلة بعد إنشاء الطلب
        $cart->items()->delete();

        return redirect()->route('order.success', $order->id)
            ->with('success', 'تم إنشاء الطلب بنجاح');
    }

    // عرض صفحة نجاح الطلب
    public function success($orderId)
    {
        $order = Order::with('items')->findOrFail($orderId);
        return view('order-success', compact('order'));
    }

    // عرض تفاصيل الطلب للمستخدم
    public function show($orderId)
    {
        $order = Order::with('items')->where('user_id', Auth::id())->findOrFail($orderId);
        return view('order-details', compact('order'));
    }

    // عرض جميع طلبات المستخدم
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('my-orders', compact('orders'));
    }
}
