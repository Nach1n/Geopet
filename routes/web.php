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

Route::get('home', 'HomeController@index')->name('home');
Route::get('/','FrontController@index')->name('front');
Route::resource('users','UsersController');
Route::resource('faqs', 'FAQsController');
Route::resource('products', 'ProductsController');
Route::get('users/{user}/account', 'UsersController@account')->name('account');

#Notifications Controller
Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
Route::get('notifications/read', 'NotificationsController@indexRead')->name('notifications.indexRead');
Route::get('notifications/{id}/{notification}', 'NotificationsController@show')->name('notifications.show');
Route::patch('notifications/{id}', 'NotificationsController@read')->name('notifications.read');
Route::delete('notifications/{id}', 'NotificationsController@destroy')->name('notifications.destroy');

#Messages Controller
Route::post('home', 'MessagesController@store')->name('messages.store');

#Options Controller
Route::get('options', 'AppOptionsController@index')->name('options');
Route::put('options', 'AppOptionsController@update')->name('options.update');
