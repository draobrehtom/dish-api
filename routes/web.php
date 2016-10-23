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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::post('dishes/add', 'DishesController@create');
    Route::patch('dishes/edit/{dish}', 'DishesController@update');
    Route::delete('dishes/remove/{dish}', 'DishesController@delete');
    Route::get('dishes/show.{type?}', 'DishesController@index');
    Route::post('login', 'AuthController@login');
});




Auth::routes();

Route::get('/home', 'HomeController@index');
