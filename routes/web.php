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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name("welcome");
Route::get('/index', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@show')->name("post.show");
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name("post.create");
Route::post('/post/save', 'App\Http\Controllers\PostController@save')->name("post.save");
Route::post('/post/saveComment', 'App\Http\Controllers\CommentController@saveComment')->name("post.saveComment");

