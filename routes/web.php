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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'NewsController@index');
Route::get('/news', 'NewsController@index');
Route::get('/news/path', 'NewsController@path');

Route::get('/news/show/{year}/{month}/{day}/{title}', 'NewsController@show');
Route::get('/news/create', 'NewsController@create');
Route::post('/news/store', 'NewsController@store');