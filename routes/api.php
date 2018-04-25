<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group([
    'prefix' => 'cache',
], function () {
    Route::get('/get/{key}', 'Hello@cacheGet');
    Route::get('/exists/{key}', 'Hello@cacheHas');
    Route::get('/put/{key}/{value}', 'Hello@cachePut');
    Route::get('/put2/{key}/{value}', 'Hello@cachePut2');
    Route::get('/delete/{key}', 'Hello@cacheDelete');
});

Route::group([
    'prefix' => 'v1',
], function () {

    Route::group([
        'prefix' => 'response',
    ], function () {
        Route::group([
            'prefix' => 'json',
        ], function () {
            Route::get('/array', 'Hello@jsonArray');
            Route::get('/object', 'Hello@jsonObject');
            Route::get('/2', 'Hello@JsonWithResponse');
        });

        Route::get('/image', 'Hello@OutputFile');
        Route::get('/download', 'Hello@FileDownload');
    });

    Route::group([
        'prefix' => 'upload',
    ], function () {
        Route::get('/', 'Hello@showUpload');
        Route::post('/', 'Hello@upload')->name('images.upload');
    });

    Route::group([
        'prefix' => 'cookies',
    ], function () {
        Route::get('/test', 'Hello@ResponseObject');
    });

    Route::group([
        'prefix' => 'db',
    ], function () {
        Route::get('/test', 'Hello@db');

    });

    Route::get('/email', function () {
        Mail::to('test@grr.la')->send(new \App\Mail\welcome());
    });
});

Route::group([
    'prefix' => 'articles',
], function () {
    Route::group([
        'prefix' => 'v1',
    ], function () {
        Route::get('/', 'Hello@listArticles');
        Route::get('/{id}', 'Hello@getArticleById');
        Route::post('/', 'Hello@createArticle');
        Route::put('/{id}', 'Hello@updateArticle');
        Route::delete('/{id}', 'Hello@deleteArticle');

    });

    Route::group([
        'prefix' => 'v2',
    ], function () {
        Route::get('/', 'ArticleController@listArticles');
        Route::get('/{article}', 'ArticleController@show');
        Route::post('/', 'ArticleController@createArticle');
        Route::put('/{article}', 'ArticleController@update');
        Route::delete('/{article}', 'ArticleController@deleteArticle');
    });
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
