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
Route::group(['middleware'=>'auth:web'],function () {
Route::group(['prefix'=>'trainee','namespace'=>'trainee'],function (){
    Route::get('/home','HomeController@index')->name('trainee.home');
    Route::post('/home','HomeController@index')->name('get.post.data');
    Route::get('/test','HomeController@test');
    Route::post('/test','HomeController@test');
    Route::get('profile{id}','ProfileController@profile');
    Route::post('/follow','ProfileController@follow');
    Route::post('/unfollow','ProfileController@unfollow');
    Route::post('/comment{id}','CommentController@WriteComment');
    Route::get('/comment{id}','CommentController@show_comments');
    Route::post('/like','LikeController@like');
    Route::post('/dislike','LikeController@dislike');
    Route::post('/search','HomeController@search')->name('trainee.search');
    Route::get('/logout','HomeController@logout')->name('trainee.logout');

    Route::group(['prefix'=>'question'],function (){
     Route::get('/add','QuestionController@add')->name('question.add');
     Route::post('/store','QuestionController@store')->name('question.store');
    });
});
});
