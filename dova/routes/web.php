<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/login','Backend\LoginController@getLogin');
Route::post('/login', 'Backend\LoginController@postLogin');
// Route::get('/nhan-su', function () {
//     return view('admin/nhansu/ns_chamcong');
// });
Route::group(['prefix' => 'staff'], function () {
    Route::get('home', "Backend\StaffController@home" );
    Route::get('timecard', "Backend\StaffController@getTimeCard");
    Route::post('timecard', "Backend\StaffController@postTimeCard");
   
    

});
Route::group(['prefix' => 'admin/{satff_id}','middleware'=>'login'], function () {
    Route::get('/', 'Backend\HomeController@admin'); 
   
});
Route::get('editnote/{id}', ['uses'=> 'Backend\StaffController@getEditnote']);
Route::post('/editNote/edit/{id}', "Backend\StaffController@postEditnote");
Route::get('admin', "Backend\LoginController@login");

// editnote/'+tc_id

