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

use App\Http\Controllers\ImageListController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});

Route::get('recipe', 'PostController@index');
Route::get('recipe/{id?}', 'RecipeController@index');
Route::get('recipe/{id?}/comment', 'PostController@comment');
Route::get('recipe/{id?}/comment/add', 'PostController@comment_add');
Route::post('recipe/{id?}/comment/add', 'PostController@comment_add');

Route::get('myrecipe', 'UserController@my_recipe');
Route::get('myrecipe/{id?}', 'PostController@post');

Route::get('add', 'RecipeController@add');
Route::post('add', 'RecipeController@create');

Route::get('/myrecipe/delete/{id?}', 'RecipeController@delete');
Route::post('/myrecipe/delete/{id?}', 'RecipeController@delete');

Route::get('/myrecipe/edit/{id?}', 'RecipeController@edit');

Route::get('/myrecipe/update/{id?}', 'RecipeController@update');
Route::post('/myrecipe/update/{id?}', 'RecipeController@update'); //updateメソッドにフォームからの情報(編集後のレシピデータ)を取得

Route::get('userlist', 'UserController@userlist');
Route::get('admin', 'UserController@admin');

Route::get('/recipe/post/{id?}', 'PostController@post');
Route::post('/recipe/post/{id?}', 'PostController@create');

Route::get('commentlist', 'PostController@commentlist');

Route::get('/myrecipe/cancel/{id?}', 'RecipeController@post_cancel');
Route::post('/myrecipe/cancel/{id?}', 'RecipeController@post_cancel');

Route::get('/myrecipe/edit/{id?}', 'RecipeController@edit');
Route::post('/myrecipe/edit/{id?}', 'RecipeController@update');

Route::get('/recipe/search', 'RecipeController@search');
Route::post('/recipe/search', 'RecipeController@search');

//https://note.com/laravelstudy/n/n038bd68f53a7#BkZEu より引用
Route::get('/form','UploadImageController@show')->name("upload_form");

Route::post('/upload','UploadImageController@upload')->name("upload_image");

Route::get('/list','ImageListController@show')->name("image_list");
