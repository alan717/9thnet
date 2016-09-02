<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});

Route::resource('posts', 'PostController');

Auth::routes();

Route::group([
    'middleware' => ['auth', 'pjax'],
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/upload', 'HomeController@upload');
    Route::resource('/posts', 'PostController');
});

