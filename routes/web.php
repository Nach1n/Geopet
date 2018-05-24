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

Route::get('/new', function(){
    $user = new App\User;
    $user->name = 'Byron';
    $user->lastname = 'Oyarzún';
    $user->email = 'byron@unab.cl';
    $user->phone_number = '56962873787';
    $user->password = bcrypt('unab.toor');
    $user->role_id = 1;
    $user->save();

    $role = new App\Role;
    $role->name = 'admin';
    $role->display_name = 'Administrador';
    $role->save();

    $user = new App\User;
    $user->name = 'Luis';
    $user->lastname = 'Ancavil';
    $user->email = 'luis@unab.cl';
    $user->phone_number = '56942881544';
    $user->password = bcrypt('unab.toor');
    $user->role_id = 2;
    $user->save();

    $role = new App\Role;
    $role->name = 'client';
    $role->display_name = 'Cliente';
    $role->save();

    return $user;
});

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
