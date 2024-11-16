<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('client.sub.login'); // Hiển thị form đăng nhập
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Thêm điều kiện kiểm tra role
        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            return redirect()->route('client.home')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ hoặc bạn không có quyền.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.home2')->with('success', 'Đăng xuất thành công!');
    }
}
