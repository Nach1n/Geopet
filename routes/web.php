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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users','UsersController');
Route::get('users/{user}/account', 'UsersController@account')->name('account');
Route::resource('/notifications', 'NotificationsController');
Route::get('/sms', function(){
    return view('SMSViews.index');
});
