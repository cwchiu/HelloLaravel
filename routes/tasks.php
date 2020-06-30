<?php

Route::get('/', 'TasksController@list')->name('tasks.index');
Route::post('/task', 'TasksController@create');
Route::delete('/task/{id}', 'TasksController@delete');