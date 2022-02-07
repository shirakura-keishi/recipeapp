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
Route::get('recipe/{id?}','RecipeController@index');

Route::get('myrecipe','UserController@my_recipe');
Route::get('myrecipe/{id?}','PostController@post');

Route::get('add','RecipeController@add');
Route::post('add','RecipeController@create');

Route::get('/myrecipe/delete/{id?}','RecipeController@delete');
Route::post('/myrecipe/delete/{id?}','RecipeController@delete');

Route::get('admin','UserController@admin');

Route::get('/recipe/post/{id?}','PostController@post');
Route::post('/recipe/post/{id?}','PostController@create');

Route::get('commentlist','PostController@commentlist');

