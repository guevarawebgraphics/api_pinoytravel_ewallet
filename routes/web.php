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
    //auth
    Route::get('/','HomeController@index');
    // Route::get('/admin/login','AdminController@login')->middleware('admin');
    
    
    // protect group routes with authentication
    // Route::group(['middleware'=> ['auth','admin']], function(){
        Route::group(['middleware'=> ['admin']], function(){
            Route::get('/admin/view/all','ResellerController@all');
            Route::get('/admin/create/reseller', 'ResellerController@create');
            Route::post('/admin/store/reseller', 'ResellerController@store')->name('admin.store.reseller');
            Route::get('/admin/wallet/reseller', 'ResellerController@wallet');
            Route::get('/admin/search/reseller', 'ResellerController@search');
            Route::get('/admin/reseller/{reseller}', 'ResellerController@show');
            Route::get('/admin/edit/reseller/{reseller}', 'ResellerController@edit');
            // Route::put('/admin/reseller/{reseller}/update', 'ResellerController@update');
            Route::put('/admin/update/{reseller}', 'ResellerController@update');
            //DELETE RESOURCE ROUTE LATER
            //REFERENCE ONLY
            // Route::resource('admin', 'ResellerController');
});
// Route::get('/admin/view/all','ResellerController@all')->middleware('admin');

//IF THE ADMIN WILL NOT BE ALLOWED TO VIEW RESELLER ACCOUNT
// Route::group(['middleware'=> ['reseller']], function(){
Route::group(['middleware'=> ['auth']], function(){
    Route::get('/reseller/commission/view','ResellerController@commission');
    Route::get('/reseller/reservation/view','ResellerController@reservation');
    Route::get('/reseller/topup','ResellerController@topup');
});
    // Route::get('/rese','ResellerController@create');
    // Route::get('/reseller/view','ResellerController@all');
    // Route::get('/reseller/edit','ResellerController@all_edit');
    // Route::get('/reseller/delete','ResellerController@all_delete');
    // Route::get('/reseller/hold','ResellerController@all_hold');
    // Route::get('/reseller/wallet','ResellerController@wallet');
    // Route::get('/reseller/search','ResellerController@search');
    // Route::get('/reseller/search2','ResellerController@search2');
    // Route::resource('reseller', 'ResellerController');
// }]);
//Testing

// Route::get('/reseller/view','ResellerController@all')->middleware('auth');
Route::get('/test','HomeController@test')->middleware('auth');

// Route::get('/test','ResellerController@testall');
// Route::get('/test2','ResellerController@testall2');
// Route::get('/test3','ResellerController@testall3');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
