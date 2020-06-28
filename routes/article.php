<?php
Route::get('/', 'ArticlesController@listArticles');
Route::get('/{id}', 'ArticlesController@getArticleById');
Route::post('/', 'ArticlesController@createArticle');
Route::put('/{id}', 'ArticlesController@updateArticle');
Route::delete('/{id}', 'ArticlesController@deleteArticle');