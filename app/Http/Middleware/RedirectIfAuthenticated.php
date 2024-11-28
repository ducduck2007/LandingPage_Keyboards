<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && $request->route()->named('client.home2')) {
            return redirect()->route('client.home')->with('info', 'Bạn đã đăng nhập!');
        }

        if (!Auth::check() && $request->route()->named('client.home')) {
            return redirect()->route('client.login')->withErrors(['error' => 'Bạn cần đăng nhập trước!']);
        }

        return $next($request);
    }
}
