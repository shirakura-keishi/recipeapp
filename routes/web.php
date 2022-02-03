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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('recipe','UserController@index');

Route::get('myrecipe','UserController@my_recipe');
Route::get('myrecipe/{id?}','RecipeController@index');

Route::get('/recipe/add','PostController@add');
Route::post('/recipe/add','PostController@create');

Route::get('admin','UserController@admin');


