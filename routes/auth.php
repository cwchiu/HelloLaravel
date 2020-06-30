
<?php

Route::get('/login', 'AuthController@loginView')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@login')->name('login.post');

Route::get('/register', 'AuthController@registerView')->name('register');
Route::post('/register', 'AuthController@register')->name('register.post');

