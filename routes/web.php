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

Route::group([
    'namespace' => 'Web',
], function () {

    Route::get('/', function () {
        return view('web.index');
    });

    Route::resource('posts', 'PostController');
});

Route::get('/test', function () {
    $data = [
        'title' => '欢迎来到我的地带',
        'name'  => '马佳荔晨',
        'to'    => 'majialichen@163.com'
    ];
    \Mail::to($data['to'])->send(new \App\Mail\UserMailer($data));
});


Route::group([
    'middleware' => ['pjax'],
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
], function () {

    Auth::routes();

    Route::get('/', 'HomeController@index');
    Route::post('/upload', 'HomeController@upload');
    Route::get('/users', 'HomeController@users');
    Route::get('/users/create', 'HomeController@create');

    Route::resource('/posts', 'PostController');
});