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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('/dump','BlockIoTestController@dump');
Route::get('/create_wallet','BlockIoTestController@createWallet');

Route::get('/verifyEmailFirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/cancel/{id}/{token}', 'CancelledMailController@cancelEmailDone')->name('cancelEmailDone');
Route::post('/canceled/email/{id}/{token}','CancelledMailController@sendCancledEmail');

Route::get('confirm/{id}/{token}', 'PaymentController@confirmMail')->name('payEmailDone');
Route::post('/pay/{id}', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/transferPage/{id}', 'PaymentController@index');

Route::get('/userDashboard','UserDashboardController@index');
Route::get('/history', 'UserDashboardController@history');
Route::get('/sell', 'UserDashboardController@sellCoin');
Route::get('/bankDetails', 'UserDashboardController@bankDetails');
Route::get('/withdraw', 'UserDashboardController@withdrawCash');
Route::get('/edit', 'UserDashboardController@editConfirm')->name('edit');
//Route::get('/confirmTransaction','UserDashboardController@confirm');
Route::get('/confirmMail', 'UserDashboardController@transactionMail');
Route::post('/update', 'UserDashboardController@updateConfirm');
Route::post('/sell','UserDashboardController@sellCoinCreate');
Route::post('/createBankDetails', 'UserDashboardController@bankDetailsCreate');
Route::post('/createWithdrawal', 'UserDashboardController@createWithdrawal');

Route::get('/marketPlace', 'MarketPlaceController@index');
Route::post('/join', 'MarketPlaceController@join');
Route::get('/joinMarket', 'MarketPlaceController@joinMarket');
Route::post('/contactSeller/{id}', 'MarketPlaceController@create');

Route::get('/sellhome','TransactionController@sell');
Route::get('/sendhome','TransactionController@send');

Route::post('/sellInstantly','SendInstantlyController@SendInstantly');

Route::get('error', 'AdminController@error');

Route::get('/admin', ['middleware' => 'admin', 'uses' => 'AdminController@index']);




