<?php

Route::get('/', 'Blog\BlogController@index');
Route::get('search', 'Blog\BlogController@search')->name('blog.search.get');

// Route::get('login', 'Blog\BlogController@showLoginForm');
// Route::post('login', 'Blog\BlogController@login')->name('login.post');
// Route::get('logout', 'Blog\BlogController@logout')->name('logout.get');

Route::resource('post', 'Blog\BlogPostController');
Route::resource('type', 'Blog\BlogPostTypeController', ['expect' => ['index'] ]);
Route::resource('post.comment', 'Blog\BlogPostCommentController', ['only' => ['store', 'destroy']]);	
