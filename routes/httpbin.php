<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'cookies'
],function () {
    Route::get('/', 'HttpBinController@cookies');
    Route::get('/set', 'HttpBinController@cookiesSet');
    Route::get('/delete', 'HttpBinController@cookiesDelete');
});

Route::get('/', 'HttpBinController@index');
Route::get('/ip', 'HttpBinController@ip');
Route::get('/uuid', 'HttpBinController@uuid');
Route::get('/user-agent', 'HttpBinController@useragent');
Route::get('/get', 'HttpBinController@get');
Route::post('/post', 'HttpBinController@post')->name('httpbin.post');
Route::any('/anything', 'HttpBinController@anything');
Route::get('/headers', 'HttpBinController@headers');
Route::get('/base64/{value}', 'HttpBinController@base64Decode');
Route::get('/encoding/utf8', 'HttpBinController@utf8');
Route::get('/status/418', 'HttpBinController@status');
Route::get('/response-headers', 'HttpBinController@responseHeader');

Route::get('/gzip', 'HttpBinController@gzip');
Route::get('/deflate', 'HttpBinController@deflate');
Route::get('/brotli', 'HttpBinController@brotli');

Route::get('/redirect-to', 'HttpBinController@redirectToUrl');

Route::get('/xml', 'HttpBinController@xml');
Route::get('/html', 'HttpBinController@html');
Route::get('/robots.txt', 'HttpBinController@robots');
Route::get('/forms/post', 'HttpBinController@showPostForm');

Route::get('/image', 'HttpBinController@imageWebp');
Route::get('/image/png', 'HttpBinController@imagePng');
Route::get('/image/jpeg', 'HttpBinController@imageJpeg');
Route::get('/image/webp', 'HttpBinController@imageWebp');
Route::get('/image/svg', 'HttpBinController@imageSvg');
