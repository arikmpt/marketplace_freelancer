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

Route::get('/','HomeController@index')->name('homepage');

Route::group(['prefix' => 'auth','as' => 'auth.'], function () {

    Route::group(['prefix' => 'login','as' => 'login.'], function () {
        Route::get('/','Auth\LoginController@index')->name('index');
    });

    Route::group(['prefix' => 'register','as' => 'register.'], function () {
        Route::get('/','Auth\RegisterController@index')->name('index');
    });
});
