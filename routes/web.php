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
Route::get('/marketPlace', 'MarketPlaceController@index');
Route::post('/join/{id}', 'MarketPlaceController@join');
Route::get('/joinMarket', 'MarketPlaceController@joinMarket');
Route::post('/contactSeller/{id}', 'MarketPlaceController@create');

Route::get('/faq','BlockIoTestController@faq');


Auth::routes();

Route::post('/sellInstantly','SendInstantlyController@sendInstantly');

Route::post('/send','SendInstantlyController@sendHomeInstantly')->name('send');

Route::get('verifyEmailFirst/{id}', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
//Route::get('/error', 'AdminController@error');
Route::get('/table',  'AdminController@table');





Route::get('/sendhome','TransactionController@sendhome');
Route::post('/sellhome','TransactionController@sell');
Route::get('/twoFactorSell','TransactionController@twoFactorsell');
Route::get('/twoFactorSendhome','TransactionController@twoFactorsendhome');




Route::get('/userDashboard','UserDashboardController@index')->name('userDashboard');
Route::get('/sell', 'UserDashboardController@sellCoin');
Route::get('/history', 'UserDashboardController@history');
Route::get('/bankDetails', 'UserDashboardController@bankDetails');
Route::get('/withdraw', 'UserDashboardController@withdrawCash');
Route::get('/edit', 'UserDashboardController@editConfirm')->name('edit');
Route::get('/confirmMail', 'UserDashboardController@transactionMail');
Route::post('/update', 'UserDashboardController@updateConfirm');
Route::post('/sell','UserDashboardController@sellCoinCreate');
Route::post('/createBankDetails', 'UserDashboardController@bankDetailsCreate');
Route::post('/createWithdrawal', 'UserDashboardController@createWithdrawal');





//Route::get('/dump','BlockIoTestController@dump');
Route::get('/test','BlockIoTestController@test');


//Route::get('/create_wallet','BlockIoTestController@createWallet');



Route::get('/cancel/{id}/{token}', 'CancelledMailController@cancelEmailDone')->name('cancelEmailDone');
Route::post('/canceled/email/{id}/{token}','CancelledMailController@sendCancledEmail');

Route::get('confirm/{id}/{token}', 'PaymentController@confirmMail')->name('payEmailDone');
Route::post('/pay/{id}', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/transferPage/{id}', 'PaymentController@index');









Route::get('/action','AdminController@action');
Route::get('/data', 'AdminController@data');

Route::get('/', 'HomeController@index');






