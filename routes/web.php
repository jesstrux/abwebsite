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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/ask', 'HomeController@ask');

Route::get('/show/{id}/{episode?}', 'HomeController@show');
Route::get('/show/{id?}/{episode?}', 'HomeController@show');

Route::get('/feel_me/{id?}/{episode?}', 'HomeController@feel_me');
Route::get('/feel_me/{id}/{episode?}', 'HomeController@feel_me');