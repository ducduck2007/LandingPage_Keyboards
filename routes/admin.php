<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\CMSUserController;
use App\Http\Controllers\Admin\DealsaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', [CMSUserController::class, 'home'])->name('admin.home');
Route::get('hello', [CMSUserController::class, 'hello'])->name('admin.sub.hello');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('deal_sale/index', [DealsaleController::class, 'index'])->name('dealSale.index');
});