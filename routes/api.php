<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('/forTelegram', 'API\GameMiniController@forTelegram')->name('gameMini.forTelegram');

Route::get('/withTelegram/{any}', 'API\GameMiniController@forTelegram')->where('any', '.*')->name('gameMini.forTelegram');
Route::get('/api/search', 'API\SreachController@search')->name('api.search');
