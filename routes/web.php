<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['guest:coach','guest']],function (){
Route::get('/login','LoginController@get_login')->name('login');
Route::post('/login','LoginController@login');
Route::get('/regester','LoginController@get_regester')->name('regester');
Route::post('/regester','LoginController@regester');
});
