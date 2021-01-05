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
    return view('home');
})->name('home');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@store');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@store');
Route::post('/logout', 'Auth\LogoutController@store')->name('logout');


Route::get('/posts', 'PostController@index')->name('posts.index');
Route::post('/posts', 'PostController@store')->name('posts.store')->middleware('auth');
Route::get('/posts/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', 'PostController@update')->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.delete')->middleware('auth');

Route::post('/posts/{post}/favorite', 'PostFavoriteController@store')->name('posts.favorite')->middleware('auth');
Route::delete('/posts/{post}/favorite', 'PostFavoriteController@destroy')->name('posts.favorite')->middleware('auth');

