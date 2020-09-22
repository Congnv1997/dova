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
// ---login
Route::match(['get', 'post'], '/login', 'Backend\AdminController@Login')->name('Auth.Login');
Route::get('/logout', 'Backend\AdminController@Logout')->name('Auth.Logout');

// User
Route::get('/','Frontend\HomeController@index')->name('home');
Route::get('/listUser', 'Backend\UserController@list')
    ->name('User.Index');
Route::post('/updateUser/{User_id}', 'Backend\UserController@update');
Route::get('/editUser/{User_id}', 'Backend\UserController@edit')->name('user.edit')
        ->name('User.Edit');
Route::post('/saveUser', 'Backend\UserController@save');
Route::get('/addUser', 'Backend\UserController@add')
    ->name('User.Add');
Route::get('/deleteUser/{User_id}', 'Backend\UserController@delete');

