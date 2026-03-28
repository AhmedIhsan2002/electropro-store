<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;

// Public Routes - ProductController
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// Static Pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

// Checkout & Order Routes
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success/{orderId}', [OrderController::class, 'success'])->name('order.success');

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    // User order routes
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('my.orders');
    Route::get('/order/{orderId}', [OrderController::class, 'show'])->name('order.details');

    // User dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes - Require Admin Role
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::put('/users/{id}/role', [AdminController::class, 'toggleUserRole'])->name('admin.users.toggle-role');
});

// Authentication Routes (Laravel Breeze)
require __DIR__.'/auth.php';