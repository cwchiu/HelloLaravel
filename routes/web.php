<?php

Route::get('/hello', 'Hello@index');
Route::get('/hello/Welcome', 'Hello@Welcome');
Route::get('/hello/Hello', 'Hello@Hello');

Route::get('/users', function () {
    $users = \App\User::all();
    return view('users', compact('users'));
});

Route::get('/users2', function () {
    $users = \App\User::paginate(5);
    return view('users2', compact('users'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'blade',
], function () {
    Route::get('/hello', 'BladeController@hello');
    Route::get('/inject', 'BladeController@inject');
    Route::get('/error', 'BladeController@error');
});
// 認證路由
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/carbon', 'Hello@carbon');
Route::get('/lang', 'Hello@lang');
Route::get('/email', 'Hello@email');
Route::get('/vue', 'Hello@vue');
Route::get('/event', 'Hello@event');
Route::get('/google/map', 'Hello@gmap');
Route::get('/captcha2', 'Hello@captcha2');
Route::post('/captcha2', 'Hello@captcha2Post')->name('captcha.post');

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('avatar', 'UserController@getAvatar');
    Route::post('avatar', 'UserController@postAvatar');
});
