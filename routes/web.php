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


// Auth Route
Auth::routes();

// Comment Route
Route::resource('comments', 'CommentController');

// Post Route
Route::get('/', 'PostsController@index')->name('post.index');

Route::get('/p/create', 'PostsController@create')->name('post.create');

Route::post('like/{like}', 'LikeController@update2')->name('like.create');

Route::post('/p', 'PostsController@store')->name('post.store');

Route::delete('/p/{post}', 'PostsController@destroy')->name('post.destroy');

Route::get('/p/{post}', 'PostsController@show')->name('post.show');

Route::post('/p/{post}', 'PostsController@updatelikes')->name('post.update'); //  This need more time


// Profile Route
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');




