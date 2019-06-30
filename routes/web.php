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
    return redirect()->route('shop.index','all');
});
Route::get('/dashboard','HomeController@dashboard')->name('dashboard');


Route::group(['prefix' => 'products'], function () {

    Route::get('/','ProductController@index')->name('products.list')->middleware('auth');

    Route::get('/create','ProductController@create')->name('products.create')->middleware('auth');

    Route::post('/create','ProductController@store')->name('products.store');

    Route::get('/{id}/edit','ProductController@edit')->name('products.edit')->middleware('auth');

    Route::post('/{id}/edit','ProductController@update')->name('products.update')->middleware('auth');

    Route::get('/{id}/destroy','ProductController@destroy')->name('products.destroy')->middleware('auth');

    Route::get('/filter','ProductController@filterByCategory')->name('products.filterByCategory');

    Route::get('/search','ProductController@search')->name('products.search');


});

Route::group(['prefix' => 'categories'], function () {

    Route::get('/','CategoryController@index')->name('categories.index')->middleware('auth');

    Route::get('/create','CategoryController@create')->name('categories.create')->middleware('auth');

    Route::post('/create','CategoryController@store')->name('categories.store');

    Route::get('/{id}/edit','CategoryController@edit')->name('categories.edit')->middleware('auth');

    Route::post('/{id}/edit','CategoryController@update')->name('categories.update');

    Route::get('/{id}/destroy','CategoryController@destroy')->name('categories.destroy');

    Route::get('/filter','CategoryController@filterByCity')->name('categories.filterByCity');

    Route::get('/search','CategoryController@search')->name('categories.search')->middleware('auth');


});


Route::group(['prefix' => 'users'], function () {
    Route::get('/logout','UserController@logout')->name('users.logout');

    Route::get('/login','UserController@login')->name('users.login');

    Route::get('/register','UserController@register')->name('users.register');

    Route::post('/create','UserController@store')->name('users.store');

    Route::get('/{id}/edit','UserController@edit')->name('users.edit');

    Route::post('/{id}/edit','UserController@update')->name('users.update');

    Route::get('/{id}/destroy','UserController@destroy')->name('users.destroy');

    Route::get('/filter','UserController@filterByCity')->name('users.filterByCity');

    Route::get('/search','UserController@search')->name('users.search');


});


Route::group(['prefix' => 'shop'], function () {
    Route::get('/{id}','ShopController@index')->name('shop.index');
    Route::get('/{id}/details','ShopController@details')->name('shop.details');
    Route::get('/header','ShopController@showcategory')->name('shop.showcategory');
    Route::get('/search','ShopController@search')->name('shop.search');
});


Route::group(['prefix' => 'cart'], function () {
    Route::get('{id}/add','CartController@add')->name('cart.add')->middleware('auth');
    Route::get('/show','CartController@show')->name('cart.show')->middleware('auth');
    Route::get('{id}/detele','CartController@detele')->name('cart.detele')->middleware('auth');
    Route::post('payment','CartController@payment')->name('cart.payment');
});



Auth::routes();
Route::get('gotoFacebook','AuthController@redirectToFacebook')->name('gotoFaceBook');
Route::get('gotoGoogle','AuthController@redirectToGoogle')->name('gotoGoogle');

Route::get('/home', 'HomeController@index')->name('home');
