<?php

use Illuminate\Http\Request;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','Auth\Api\AuthController@login');

Route::post('/dragonpay','Auth\Api\AuthController@dragonpay');

Route::middleware('auth:api')->group(function () {

    Route::post('/top_up_wallet','Auth\Api\AuthController@top_up_wallet');
    
    Route::post('/logout','Auth\Api\AuthController@logout');

    Route::post('/register','Auth\Api\AuthController@register');

    Route::post('/top_up_history','Auth\Api\AuthController@top_up_history');

    Route::post('/update','Auth\Api\AuthController@update');

    Route::post('/delete','Auth\Api\AuthController@delete');

    Route::post('/search_user','Auth\Api\AuthController@search_user');
    
    // Route::post('/dragonpay','Auth\Api\AuthController@dragonpay');

});