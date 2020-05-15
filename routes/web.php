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

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('nosotros', 'PagesController@about')->name('pages.about');
Route::get('archivo', 'PagesController@archive')->name('pages.archive');
Route::get('contacto', 'PagesController@contact')->name('pages.contact');


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

    Route::resource('posts', 'PostController')->except('show');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController')->except('show');
    Route::resource('abilities', 'AbilityController')->only(['index', 'edit', 'update']);

    Route::put('users/{user}/roles', 'UserRolesController@update')
        ->middleware('can:manage-roles-and-abilities')
        ->name('users.roles.update');
    Route::put('users/{user}/abilities', 'UserAbilitiesController@update')
        ->middleware('can:manage-roles-and-abilities')
        ->name('users.abilities.update');

    Route::post('posts/{post}/photos', 'PhotoController@store')->name('posts.photos.store');
    Route::delete('photos/{photo}', 'PhotoController@destroy')->name('photos.destroy');
});

Auth::routes(['register' => false]);

