<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::group([
//     'prefix' => 'auth'
// ],function () {
//     include base_path("routes/auth.php");
// });

Route::group([
    'prefix' => 'tasks'
],function () {
    include base_path("routes/tasks.php");
});

Route::group([
    'prefix' => 'blog'
],function () {
    include base_path("routes/blog.php");
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
