<?php
Route::get('/v1', 'NoteController@v1');
Route::get('/v2', 'NoteController@v2');
Route::get('/', 'NoteController@index');
Route::resource('vuenotes','NoteController');