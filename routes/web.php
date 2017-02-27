<?php

Route::get('/', 'BookController@showIndex');

Route::get('/add', 'BookController@showAdd');

Route::get('/edit/{person}', 'BookController@showEdit');

Route::get('/delete/{person}', 'BookController@doDelete');

Route::post('/edit', 'BookController@doEdit');

Route::get('/search', 'BookController@showSearch');

Route::post('/search', 'BookController@doSearch');