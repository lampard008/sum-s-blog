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

Auth::routes(['verify'=>true]);



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post', 'HomeController@post')->name('post');

Route::group(['prefix'=>'avatar'],function() {
    Route::post('/update_image','Avatar@avatar')->name('update_image');
    Route::get('/update_image','Avatar@avatar')->name('update_image');
    Route::view('/update_image','contents.update_image');
});
Route::group(['prefix'=>'update'],function() {
    Route::post('/profile','UpdateProfile@update_profiles')->name('update_profile');
    Route::get('/profile','UpdateProfile@update_profiles')->name('update_profile');
    Route::view('/profile','contents.updateProfile');
    Route::post('/password','UpdateProfile@update_password')->name('update_password');
    Route::get('/password','UpdateProfile@update_password')->name('update_password');
    Route::view('/password','contents.changePassword');
});


