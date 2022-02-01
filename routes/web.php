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
    return view('welcome');
});

Route::get('recipe','UserController@index');
Route::get('myrecipe','UserController@my_recipe');
Route::get('admin','UserController@admin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
