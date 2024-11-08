<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('cuongLon', 'Admin\LoginController@index')->name('admin.homeLogin');
Route::post('postLogin', 'Admin\LoginController@postLogin')->name('login');

Route::get('home', 'Admin\CMSUserController@home')->name('admin.home');
Route::group(['prefix' => 'manager', 'middleware' => ['admin']], function () {
    Route::any('logout', 'Admin\LoginController@logout')->name('Logout');
    Route::post('UpdatePass', 'Admin\LoginController@UpdatePass')->name('update-pass');
    Route::get('view-change-pass', 'Admin\LoginController@ViewChangePass')->name('view-change-pass');
    Route::get('home', 'HomeController@index')->name('MgHome');
});

Route::group(['prefix' => 'cms-user', 'middleware' => ['admin']], function () {
    Route::post('post-ckediter', 'Admin\FunctionController@uploadCK')->name('ckeditor.upload');
    Route::get('index', 'Admin\CMSUserController@index')->name('cms-user.index');
    Route::get('create', 'Admin\CMSUserController@create')->name('cms-user.create');
    Route::get('edit/{id}', 'Admin\CMSUserController@edit')->name('cms-user.edit');
    Route::post('postCreate', 'Admin\CMSUserController@postCreate')->name('cms-user.postCreate');
    Route::post('postUpdate/{id}', 'Admin\CMSUserController@postUpdate')->name('cms-user.postUpdate');
});

Route::group(['prefix' => 'header', 'middleware' => ['admin']], function () {
    Route::get('index', 'Admin\HeaderController@index')->name('header.index');
    Route::get('update/{id}', 'Admin\HeaderController@update')->name('header.update');
    Route::post('post-update', 'Admin\HeaderController@postUpdate')->name('header.postUpdate');
    Route::get('create', 'Admin\HeaderController@create')->name('header.create');
    Route::post('post-create', 'Admin\HeaderController@postCreate')->name('header.postCreate');
    Route::post('delete', 'Admin\HeaderController@delete')->name('header.delete');
});