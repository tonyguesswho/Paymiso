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


Route::get('/user_dashboard','UserDashboardController@index');
Route::get('/sell', 'UserDashboardController@sellCoin');
Route::get('/history', 'UserDashboardController@history');
Route::get('/bank_details', 'UserDashboardController@bankDetails');
Route::get('/withdraw', 'UserDashboardController@withdrawCash');
Route::get('/edit', 'UserDashboardController@editConfirm')->name('edit');
Route::get('/confirmTransaction','UserDashboardController@confirm');
Route::get('/confirmMail', 'UserDashboardController@transactionMail');
Route::post('/update', 'UserDashboardController@updateConfirm');
Route::post('/sell','UserDashboardController@sellCoinCreate');
Route::post('/bank_details', 'UserDashboardController@bankDetailsCreate');


Route::get('/sellhome','TransactionController@sell');
Route::get('/sendhome','TransactionController@send');






