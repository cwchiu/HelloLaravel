<?php
Route::get('/api', 'NoteController@api');
Route::get('/', 'NoteController@index');
Route::resource('vuenotes','NoteController');