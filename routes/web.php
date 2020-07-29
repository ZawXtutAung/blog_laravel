<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/','ArticleController@index');
//Route::get('/articles','ArticleController@index');
//
//Route::get('/articles/detail/{id}','ArticleController@detail');
//
//Route::post('/articles/add','ArticleController@create');
//
//Route::get('/articles/delete/{id}','ArticleController@delete');
//
//Route::get('/products','Product/ProductController@index');
Route::get('/','ArticleController@index');
Route::get('/articles/add','ArticleController@add');

Route::post('/articles/add','ArticleController@create');
Route::get('/articles/delete/{article}','ArticleController@delete');

Route::post('/comments/add','CommentController@create');
Route::get('/comments/delete/{comment}','CommentController@delete');



Route::get('/articles','ArticleController@index');

Route::get('/articles/detail/{article}','ArticleController@detail');
Auth::routes();
Route::get('/home', 'HomeController@index');
