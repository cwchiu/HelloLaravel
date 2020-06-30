<?php

Route::get('/', 'Blog\BlogController@index')->name('blog.index');
Route::get('search', 'Blog\BlogController@search')->name('blog.search.get');

Route::get('login', 'Blog\BlogController@showLoginForm')->name('blog.login');
Route::post('login', 'Blog\BlogController@login')->name('blog.login.post');
Route::get('logout', 'Blog\BlogController@logout')->name('blog.logout.get');

Route::resource('post', 'Blog\BlogPostController');
Route::resource('type', 'Blog\BlogPostTypeController', ['expect' => ['index']]);
Route::resource('post.comment', 'Blog\BlogPostCommentController', ['only' => ['store', 'destroy']]);

// Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
//     Route::get('avatar', 'Blog\UserController@getAvatar');
//     Route::post('avatar', 'Blog\UserController@postAvatar');
// });
