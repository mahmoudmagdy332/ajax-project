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

Route::group(['prefix'=>'coach','namespace'=>'coach','middleware'=>'auth:coach'],function (){
    Route::get('/home','HomeController@index')->name('coach.home');
    Route::get('/add','PostController@add')->name('coach.add.post');
    Route::post('/store','PostController@store')->name('coach.store.post');
    Route::get('/logout','HomeController@logout')->name('coach.logout');
});

