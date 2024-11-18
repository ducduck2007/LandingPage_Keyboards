<?php

use Illuminate\Support\Facades\Route;

// Route cho trang chủ
Route::get('/', 'Client\HomeController@index')->name('client.home2');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/trangChu', 'Client\HomeController@index2')->name('client.home');
});

// Authentication Routes
// Route đăng nhập
Route::get('login', 'Client\Auth\LoginController@showLoginForm')->name('client.login');
Route::post('login', 'Client\Auth\LoginController@login');
Route::post('logout', 'Client\Auth\LoginController@logout')->name('client.logout');

// Route đăng ký
Route::get('register', 'Client\Auth\RegisterController@showRegistrationForm')->name('client.register');
Route::post('register', 'Client\Auth\RegisterController@register');

// Route quên mật khẩu
Route::get('password/reset', 'Client\Auth\ForgotPasswordController@showLinkRequestForm')->name('client.password.request');
Route::post('password/email', 'Client\Auth\ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');

// Route đặt lại mật khẩu
Route::get('password/reset/{token}', 'Client\Auth\ResetPasswordController@showResetForm')->name('client.password.reset');
Route::post('password/reset', 'Client\Auth\ResetPasswordController@reset')->name('client.password.update')
