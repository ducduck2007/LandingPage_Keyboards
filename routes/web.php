<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

Route::get('/', 'Client\HomeController@index')->name('client.home');
Route::get('/su-kien', 'Client\EventsController@index')->name('client.events');
Route::get('/game-play', 'Client\GameplayController@index')->name('client.gameplay');
Route::get('/tin-tuc/{slug}', 'Client\NewsController@newsDetail')->name('client.news_detail');
Route::get('/lich-mo-server', 'Client\CalenderController@index')->name('client.calender');

Route::get('{slug}', 'Client\SearchController@index')->name('client.search_detail');
Route::post('/get-download', 'Client\HomeController@getDownload')->name('getDownload');
Route::post('/connect-to-gamemini', 'Client\HomeController@connectToGameMini')->name('connectToGameMini');