<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Trang chính khi chưa đăng nhập
Route::get('/', 'Client\HomeController@index')->name('client.home2')->middleware('guest'); 

// Auth routes
Auth::routes([
    'register' => false, // Vô hiệu hóa mặc định của Laravel nếu không muốn dùng chức năng này
    'reset' => false,    // Tắt chức năng reset password nếu không dùng
]);

// Đăng nhập/Đăng ký với Middleware điều hướng người dùng
Route::middleware('guest')->group(function () {
    Route::get('login', 'Client\Auth\LoginController@showLoginForm')->name('client.login');
    Route::post('login', 'Client\Auth\LoginController@login');
    Route::get('register', 'Client\Auth\RegisterController@showRegistrationForm')->name('client.register');
    Route::post('register', 'Client\Auth\RegisterController@register');
});

// Đăng xuất (không yêu cầu middleware auth)
Route::post('logout', 'Client\Auth\LoginController@logout')->name('client.logout');

// Trang thao tác được sau khi đăng nhập thành công
Route::middleware('auth')->group(function () {
    Route::get('/trangChu', 'Client\HomeController@index2')->name('client.home');
    Route::post('/add-to-cart', 'Client\CartController@addToCart')->name('cart.add');
    Route::get('/update-cart', 'Client\CartController@updateCart')->name('update.cart');
    Route::post('/checkout', 'Client\CartController@checkout')->name('checkout');
    Route::get('history-product', 'Client\CartController@history')->name('history');

    Route::get('/cart/count', 'Client\HomeController@getCartCount')->name('cart.count');
});
