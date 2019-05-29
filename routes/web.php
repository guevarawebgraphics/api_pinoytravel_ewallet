<?php

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

// Route::get('/', function () {
//     return view('testing.test1');
// });

// Route::get('/reseller/all','ResellerController@all');
//ADMIN
Route::get('/','ResellerController@index');
Route::get('/admin/login','AdminController@login');
Route::get('/reseller/view','ResellerController@all');
Route::get('/reseller/edit','ResellerController@all_edit');
Route::get('/reseller/delete','ResellerController@all_delete');
Route::get('/reseller/hold','ResellerController@all_hold');
Route::get('/reseller/wallet','ResellerController@wallet');
Route::resource('reseller', 'ResellerController');