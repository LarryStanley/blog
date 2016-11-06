<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'posts'], function() {
	Route::get('/', 'Api\PostController@index');
	Route::get('/{id}', 'Api\PostController@getPost');
	Route::post('/', 'Api\PostController@new')->middleware('auth:api');
	Route::post('/{id}', "Api\PostController@edit")->middleware('auth:api');;
	Route::delete('/{id}', 'Api\PostController@delete')->middleware('auth:api');;
});

Route::group(['prefix' => 'files'], function() {
	Route::get('/', 'Api\FileController@index');
	Route::get('/{file_name}', 'Api\FileController@getFile');
	Route::get('/info/{file_name}', 'Api\FileController@getFileInfo');
	Route::post('/', 'Api\FileController@new')->middleware('auth:api');;
	Route::delete('/{id}', 'Api\FileController@delete')->middleware('auth:api');;
});

Route::group(['prefix' => 'navigation'], function() {
	Route::get('/', 'Api\NavigationController@index');
	Route::get('/{id}', 'Api\NavigationController@getNav');
	Route::post('/', 'Api\NavigationController@new')->middleware('auth:api');
	Route::delete('/{id}', 'Api\NavigationController@deleteNav')->middleware('auth:api');
	Route::group(['prefix' => 'sub_navigation'], function() {
		Route::get('/{parent_id}', 'Api\NavigationController@getSubNav');
		Route::post('/{parent_id}', 'Api\NavigationController@newSubNav');
		Route::delete('/{id}', 'Api\NavigationController@deleteSubNav')->middleware('auth:api');
	});
});