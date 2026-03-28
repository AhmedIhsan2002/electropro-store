<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Ensure user is admin before any action
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Admin Dashboard - Statistics overview
     */
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

    /**
     * Product Management
     */
    public function products()
    {
        $products = Product::with('category', 'brand')->latest()->paginate(10);
        return view('admin.products', compact('products'));
    }

    /**
     * Order Management
     */
    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    /**
     * Update order status
     * SECURITY: Validate status value
     */
    public function updateOrderStatus(Request $request, $id)
    {
        // Validate status
        $validStatuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

        $request->validate([
            'status' => 'required|string|in:' . implode(',', $validStatuses),
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    /**
     * User Management
     */
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Toggle user role
     * SECURITY: Prevent self-demotion, prevent demoting last admin
     */
    public function toggleUserRole($id)
    {
        $targetUser = User::findOrFail($id);
        $currentUser = Auth::user();

        // SECURITY: Prevent self-demotion
        if ($targetUser->id === $currentUser->id) {
            return redirect()->back()->with('error', 'لا يمكنك تغيير صلاحيتك بنفسك');
        }

        // SECURITY: Prevent demoting the last admin
        if ($targetUser->role === 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return redirect()->back()->with('error', 'لا يمكن إزالة صلاحيات آخر مدير');
            }
        }

        // Toggle role
        $targetUser->role = $targetUser->role === 'admin' ? 'customer' : 'admin';
        $targetUser->save();

        $message = $targetUser->role === 'admin'
            ? 'تم ترقية المستخدم إلى مدير بنجاح'
            : 'تم إلغاء صلاحيات المدير بنجاح';

        return redirect()->back()->with('success', $message);
    }
}