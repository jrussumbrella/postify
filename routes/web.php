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

// Front or User Routes
Route::middleware(['auth'])->group(function () {
    //Posts routes
    Route::get('/posts/create', 'User\PostController@create')->name('posts.create');
    Route::post('/posts', 'User\PostController@store')->name('posts.store');
    Route::put('/posts/{post}', 'User\PostController@update')->name('posts.update');
    Route::delete('/posts/{post}', 'User\PostController@destroy')->name('posts.destroy');
    Route::get('/posts/{post}/edit', 'User\PostController@edit')->name('posts.edit');

    //Posts Favorite routes
    Route::post('/posts/{post}/favorite', 'PostFavoriteController@store')->name('posts.favorite');
    Route::delete('/posts/{post}/favorite', 'PostFavoriteController@destroy')->name('posts.favorite');
    
});

Route::get('/posts', 'User\PostController@index')->name('posts.index');
Route::get('/posts/{post}', 'User\PostController@show')->name('posts.show');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        //Dashboard
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

        //Categories routes
        Route::get('/categories', function () {
            return 'categories';
        });

        

    });
});




