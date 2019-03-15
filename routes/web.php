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
    Route::get('/posts', 'Post\IndexController@index')->name('posts.index');
    Route::get('/posts/restore', 'Post\RestoreController@restore')->name('posts.restore');
    Route::get('/posts/create', 'Post\CreateController@create')->name('posts.create');
    Route::post('/posts','Post\StoreController@store')->name('posts.store');
    Route::delete('/posts/{post}','Post\DestroyController@destroy')->name('posts.destroy');
    Route::get('/posts/{post}/edit','Post\EditController@edit')->name('posts.edit');
    Route::put('/posts/{post}','Post\UpdateController@update')->name('posts.update');
    Route::get('/posts/{post}','Post\ShowController@show')->name('posts.show');
    
    Route::get('/posts/{post}/comment/create','CommentsController@create')->name('comments.create');
    Route::post('/comments','CommentsController@store')->name('comments.store');

    Route::get('/home', 'HomeController@index')->name('home');
});
