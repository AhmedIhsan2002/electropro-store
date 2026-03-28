<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;

// الصفحات العامة (من ProductController)
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// مسارات السلة


// الصفحات الثابتة
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
// صفحة الدفع (مؤقتة)
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success/{orderId}', [OrderController::class, 'success'])->name('order.success');
Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('my.orders')->middleware('auth');
Route::get('/order/{orderId}', [OrderController::class, 'show'])->name('order.details')->middleware('auth');

// مسارات المصادقة
require __DIR__.'/auth.php';

// لوحة التحكم
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
