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

Route::get('recipe','PostController@index');

Route::get('myrecipe','UserController@my_recipe');
Route::get('myrecipe/{id?}','RecipeController@index');

Route::get('/recipe/add','RecipeController@add');
Route::post('/recipe/add','RecipeController@create');

Route::get('admin','UserController@admin');

Route::get('/recipe/post/{id?}','PostController@post');
Route::post('/recipe/post/{id?}','PostController@create');

