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
], function ($route) {
    $route->get('/', 'HomeController@index');
    Route::resource('posts', 'PostController');
    Auth::routes();
});

Route::get('/test', function () {
    $data = [
        'title' => '欢迎来到我的地带',
        'name'  => '贺钧威',
        'to'    => 'horan@9thnet.com'
    ];
    \Mail::to($data['to'])->send(new \App\Mail\UserMailer($data));
    echo '发送成功';
});


Route::group([
    'middleware' => ['pjax'],
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
], function ($route) {

    Auth::routes();

    $route->get('/', 'DashboardController@index');
    $route->post('/upload', 'DashboardController@upload');
    $route->get('users/send-email', 'DashboardController@showEmailForm');
    $route->get('users/email', 'DashboardController@showSendEmail');
    $route->post('users/send-email', 'DashboardController@sendEmail');
    $route->resource('managers', 'ManagerController');
    $route->resource('users', 'UserController');
    $route->resource('posts', 'PostController');
});