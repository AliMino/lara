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
    return redirect()->route('posts.index');
});
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', 'PostsController@index')->name('posts.index');
    Route::get('/posts/restore', 'PostsController@restore')->name('posts.restore');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
   Route::post('/posts','PostsController@store')->name('posts.store');
    Route::delete('/posts/{post}','PostsController@destroy')->name('posts.destroy');
    Route::get('/posts/{post}/edit','PostsController@edit')->name('posts.edit');
    Route::put('/posts/{post}','PostsController@update')->name('posts.update');
    Route::get('/posts/{post}','PostsController@show')->name('posts.show');
    
    Route::get('/posts/{post}/comment/create','CommentsController@create')->name('comments.create');
    Route::post('/comments','CommentsController@store')->name('comments.store');

    Route::get('/home', 'HomeController@index')->name('home');
});
