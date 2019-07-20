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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'products'], function () {

    Route::get('/', 'ApiProductController@index');
    Route::get('/{id}', 'ApiProductController@show');
    Route::post('', 'ApiProductController@store');
    Route::put('/{id}', 'ApiProductController@update');
    Route::delete('/{id}', 'ApiProductController@delete');
});

Route::group(['prefix' => 'categories'], function () {

    Route::get('/', 'ApiCategoryController@index');
    Route::get('/{id}', 'ApiCategoryController@show');
    Route::post('', 'ApiCategoryController@store');
    Route::put('/{id}', 'ApiCategoryController@update');
    Route::delete('/{id}', 'ApiCategoryController@delete');
});

Route::group(['prefix' => 'users'], function () {

    Route::get('/', 'ApiUserController@index');
    Route::get('/{id}', 'ApiUserController@show');
    Route::post('', 'ApiUserController@store');
    Route::put('/{id}', 'ApiUserController@update');
    Route::delete('/{id}', 'ApiUserController@delete');
});
