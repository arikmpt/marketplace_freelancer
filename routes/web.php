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
        Route::post('/', 'Auth\RegisterController@store')->name('store');
    });
});

Route::group(['prefix' => 'projects','as' => 'project.'], function () {

    Route::get('/list','ProjectController@guestList')->name('list');
    Route::get('/detail','ProjectController@guestDetail')->name('detail');

});


// admin route group

Route::group(['prefix' => 'backyard', 'as' => 'admin.','namespace' => 'Admin'], function () {
    
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/','CategoryController@index')->name('index');
        Route::post('/save','CategoryController@store')->name('save');
        Route::put('/update','CategoryController@update')->name('update');
        Route::delete('/delete','CategoryController@delete')->name('delete');
    });

    Route::group(['prefix' => 'skill', 'as' => 'skill.'], function () {
        Route::get('/','SkillController@index')->name('index');
        Route::post('/save','SkillController@store')->name('save');
        Route::put('/update','SkillController@update')->name('update');
        Route::delete('/delete','SkillController@delete')->name('delete');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/','UserController@index')->name('index');
    });
});