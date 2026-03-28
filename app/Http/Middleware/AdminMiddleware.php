<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // التحقق إذا كان المستخدم مسجل دخول وصلاحيته admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // إذا لم يكن أدمن، يوجه للصفحة الرئيسية
        return redirect('/')->with('error', 'ليس لديك صلاحية للدخول إلى هذه الصفحة');
    }
}
