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

URL::forceRootUrl(env('APP_URL'));

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

            Route::post('/admin/edit/reseller/modifybalance', 'ResellerController@modifybalance')->name('modifybalance');
            Route::post('/admin/edit/reseller/modifyVal', 'ResellerController@modifyVal')->name('modifyVal');
            Route::get('/admin/new_admin', 'ResellerController@create_admin');
            Route::post('/admin/new_admin/newAdminVal', 'ResellerController@newAdminVal')->name('newAdminVal');
            Route::post('/admin/new_admin/newAdmin', 'ResellerController@newAdmin')->name('newAdmin');

            Route::post('/getEPassbook', 'ResellerController@getEPassbook')->name('getEPassbook');

            Route::get('/admin/deleted', 'ResellerController@getDeletedAccounts');
            Route::get('/admin/deleted/RcrdsDeletedAccounts', 'ResellerController@RcrdsDeletedAccounts')->name('RcrdsDeletedAccounts');
            Route::post('/admin/deleted/activateAccount', 'ResellerController@activateAccount')->name('activateAccount');

            Route::post('/getunpaid', 'ResellerController@getunpaid')->name('getunpaid');
            Route::post('/admin/reseller/markaspaid', 'ResellerController@markaspaid')->name('markaspaid');
});
// Route::get('/admin/view/all','ResellerController@all')->middleware('admin');

//IF THE ADMIN WILL NOT BE ALLOWED TO VIEW RESELLER ACCOUNT
// Route::group(['middleware'=> ['reseller']], function(){
Route::group(['middleware'=> ['auth']], function(){
    
    Route::get('/reseller/commission/view','ResellerController@commission');
    Route::get('/reseller/reservation/view','ResellerController@reservation');
    Route::get('/reseller/topup','ResellerController@topup');

    Route::get('/message/success', function () {
        return view('pages.message.success');
    });

    Route::get('/message/pending', function () {
        return view('pages.message.pending');
    });
    // Route::get('/reseller/wallet','ResellerController@resellerWallet');

    
    Route::get('/reseller/transaction_history','TransactionController@index');
    Route::get('reseller/transaction_history/getTxnHistory', 'TransactionController@getTxnHistory')->name('getTxnHistory');
    // Route::get('reseller/transaction_history/getToastDtls', 'TransactionController@getToastDtls')->name('getToastDtls');

    Route::get('/reseller/top_up_history','ResellerController@transactions');
    Route::get('reseller/transactions/getTopup', 'ResellerController@getTopup')->name('getTopup');
    
    Route::post('/reseller/topup/checkout', 'ResellerController@checkoutDragonpay');


    Route::get('pay/getReceipt', 'PayController@getReceipt')->name('getReceipt');
    Route::post('pay/payNow', 'PayController@payNow')->name('payNow');
    Route::post('pay/payVal', 'PayController@payVal')->name('payVal');
    Route::post('pay/cancelEwallet', 'PayController@cancelEwallet')->name('cancelEwallet');
    Route::post('pay/cancelSession', 'PayController@cancelSession')->name('cancelSession');

    Route::get('/reseller/passbook/getEPassbookReseller', 'ResellerPassbook@getEPassbookReseller')->name('getEPassbookReseller');
    Route::get('/reseller/passbook','ResellerPassbook@index');

    Route::post('/reseller/topup/directdepositval', 'ResellerController@directdepositval')->name('directdepositval');
    Route::post('/reseller/topup/directdeposit', 'ResellerController@directdeposit')->name('directdeposit');

    Route::get('/reseller/unpaid/getUnpaidReseller', 'ResellerUnpaid@getUnpaidReseller')->name('getUnpaidReseller');
    Route::get('/reseller/unpaid','ResellerUnpaid@index');

    Route::get('/reseller/profile','ProfileController@index');
    Route::post('/reseller/profile/changePwdVal', 'ProfileController@changePwdVal')->name('changePwdVal');
    Route::post('/reseller/profile/changePwd', 'ProfileController@changePwd')->name('changePwd');
    
    // Route::post('/reseller/topup/payment','TopupController@topupPayment')->name('/reseller/topup/payment');
    // Route::get('/reseller/topup/success','TopupController@executePayment')->name('/reseller/topup/success');
    // Route::get('/reseller/topup/cancel','TopupController@cancelPayment')->name('/reseller/topup/cancel');
    // Route::get('/execute-payment', 'TopupController@execute')->name('/execute-payment');
    // Route::get('/dragonpaytest', 'TopupController@dragonPayTest');
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
Route::get('/testt', 'ResellerController@paymentStatus');
// Route::get('/reseller/view','ResellerController@all')->middleware('auth');
Auth::routes();
Route::get('/test','HomeController@test')->middleware('auth');
Route::get('/test','HomeController@test')->middleware('auth');

// Route::get('/test','ResellerController@testall');
// Route::get('/test2','ResellerController@testall2');
// Route::get('/test3','ResellerController@testall3');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pay', 'PayController@index');