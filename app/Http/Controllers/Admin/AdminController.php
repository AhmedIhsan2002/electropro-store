<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // لوحة التحكم الرئيسية
    public function dashboard()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalRevenue = Order::sum('total');

        $pendingOrders = Order::where('status', 'pending')->count();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalProducts', 'totalUsers', 'totalRevenue',
            'pendingOrders', 'recentOrders'
        ));
    }

    // إدارة المنتجات
    public function products()
    {
        $products = Product::with('category', 'brand')->latest()->paginate(10);
        return view('admin.products', compact('products'));
    }

    // إدارة الطلبات
    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    // تحديث حالة الطلب
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    // إدارة المستخدمين
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    // تغيير صلاحية المستخدم
    public function toggleUserRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = $user->role === 'admin' ? 'customer' : 'admin';
        $user->save();

        return redirect()->back()->with('success', 'تم تحديث صلاحية المستخدم بنجاح');
    }
}
