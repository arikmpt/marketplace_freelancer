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

Route::group(['prefix' => 'page','as' => 'page.'], function () {
    Route::get('/{slug}','PageController@index')->name('index');
});

Route::group(['prefix' => 'auth','as' => 'auth.'], function () {

    Route::get('/logout','Auth\LoginController@logout')->name('logout');
    Route::group(['prefix' => 'login','as' => 'login.'], function () {
        Route::get('/','Auth\LoginController@index')->name('index');
        Route::post('/','Auth\LoginController@login')->name('login');
    });

    Route::group(['prefix' => 'register','as' => 'register.'], function () {
        Route::get('/','Auth\RegisterController@index')->name('index');
        Route::post('/', 'Auth\RegisterController@store')->name('store');
    });
});

Route::group(['prefix' => 'projects','as' => 'project.'], function () {

    Route::get('/list','ProjectController@guestList')->name('list');
    Route::get('/category/{slug}/list', 'ProjectController@guestListByCategory')->name('list.category');
    Route::get('/detail/{uuid}','ProjectController@guestDetail')->name('detail');

    Route::group(['prefix' => 'bid','as' =>'bid.'], function () {
        Route::post('/save','BidController@store')->name('store');
        Route::post('/choose','BidController@chooseWinner')->name('choose.winner');
    });
});

Route::group(['prefix' => 'profile','as' => 'profile.'], function () {

    Route::get('/me','ProfileController@my')->name('me');
    Route::get('/guest/{uuid}','ProfileController@guest')->name('guest');
    Route::post('/update', 'ProfileController@update')->name('update');
    Route::post('/changepassword', 'ProfileController@changePassword')->name('change.password');

    Route::group(['prefix' => 'projects','as' => 'project.'], function () {

        Route::get('/','ProjectController@ownList')->name('list');
        Route::get('/new','ProjectController@new')->name('new');
        Route::get('/{uuid}','ProjectController@detail')->name('detail');
        Route::get('/edit/{uuid}','ProjectController@edit')->name('edit');
        Route::post('/save','ProjectController@save')->name('save');
        Route::post('/update','ProjectController@update')->name('update');
        Route::post('/delete','ProjectController@delete')->name('delete');
        Route::post('/worker/done','ProjectController@workerDone')->name('worker.done');
        Route::post('/owner/done','ProjectController@ownerDone')->name('owner.done');

        Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
            Route::post('/','TransactionController@getTransaction')->name('get.transaction');
            Route::post('/paid','TransactionController@paid')->name('paid');
            Route::post('/confirm','TransactionController@confirm')->name('confirm');
        });
    
    });

});


Route::group(['prefix' => 'misc','as' => 'misc.'], function () {
    Route::post('/getCities', 'ProfileController@getCitiesByState')->name('getcities');
    Route::post('/getDistrics', 'ProfileController@getDistricsByCitiy')->name('getdistricts');
    Route::post('/getVillages', 'ProfileController@getVillagesByDistrict')->name('getvillages');
});


// admin route group

Route::group(['prefix' => 'admin', 'as' => 'admin.','namespace' => 'Admin'], function () {
    
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

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('/','TransactionController@index')->name('index');
        Route::post('/confirm','TransactionController@confirm')->name('confirm');
    });
    
    Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
        Route::get('/','ProjectController@index')->name('index');
        Route::post('/accept','ProjectController@accept')->name('accept');
        Route::post('/reject','ProjectController@reject')->name('reject');
        Route::get('/{uuid}','ProjectController@detail')->name('detail');
    });

    Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
        Route::get('/','PageController@index')->name('index');
        Route::get('/new','PageController@new')->name('new');
        Route::get('/edit/{slug}','PageController@edit')->name('edit');
        Route::get('/detail/{uuid}','PageController@detail')->name('detail');
        Route::post('/save','PageController@store')->name('save');
        Route::post('/update','PageController@update')->name('update');
        Route::delete('/delete','PageController@delete')->name('delete');
    });

});