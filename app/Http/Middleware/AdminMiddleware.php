<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng có vai trò admin hay không
        if (auth()->user() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng người dùng
        return redirect('/'); // Hoặc chuyển hướng đến trang không có quyền truy cập
    }
}
