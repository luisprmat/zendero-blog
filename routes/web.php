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

Route::get('/', 'PagesController@home');
Route::get('blog/{post}', 'PostController@show')->name('posts.show');
Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagController@show')->name('tags.show');

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function()
{
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('posts', 'PostController@index')->name('posts.index');
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts', 'PostController@store')->name('posts.store');
    Route::get('posts/{post}', 'PostController@edit')->name('posts.edit');
    Route::put('posts/{post}', 'PostController@update')->name('posts.update');

    Route::post('posts/{post}/photos', 'PhotoController@store')->name('posts.photos.store');
    Route::delete('photos/{photo}', 'PhotoController@destroy')->name('photos.destroy');
});

Auth::routes(['register' => false]);

