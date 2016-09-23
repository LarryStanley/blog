<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/posts/{id}', 'HomeController@posts');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function() {
    	return view('home');
    });
    Route::group(['prefix' => 'posts'], function() {
    	Route::get('/', 'Admin\PostController@index');
        Route::get('new', 'Admin\PostController@new');
        Route::post('new', 'Api\PostController@new');
        Route::get('edit/{id}', 'Admin\PostController@edit');
        Route::post('edit/{id}', 'Api\PostController@edit');
        Route::delete('{id}', 'Api\PostController@delete');
    });

    Route::group(['prefix' => 'navigation'], function() {
    	Route::get('/', 'Admin\NavigationController@index');
        Route::post('/', 'Api\NavigationController@new');
        Route::delete('/{id}', 'Api\NavigationController@deleteNav');
        Route::group(['prefix' => 'sub_navigation'], function() {
            Route::post('/{parent_id}', 'Api\NavigationController@newSubNav');
            Route::delete('/{id}', 'Api\NavigationController@deleteSubNav');
        });
    });

    Route::group(['prefix' => 'files'], function() {
        Route::get('/new', 'Admin\FileController@new');
        Route::post('/new', 'Api\FileController@new');
    });
});