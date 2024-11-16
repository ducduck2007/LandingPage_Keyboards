<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        // Nếu chưa đăng nhập, chuyển hướng đến trang login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập!');
        }

        // Nếu đã đăng nhập, tiếp tục
        return $next($request);
    }
}
