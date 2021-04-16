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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/posts', 'App\Http\Controllers\PostController@list')->name("posts.list");
Route::post('/posts/save', 'App\Http\Controllers\PostController@save')->name("posts.save");
Route::post('/posts/saveComment', 'App\Http\Controllers\PostController@saveComment')->name("posts.saveComment");
Route::get('/posts/{id}', 'App\Http\Controllers\PostController@show')->name("posts.show");
Route::delete('/posts/deleteComment/{id}', 'App\Http\Controllers\PostController@deleteComment')->name("posts.deleteComment");
