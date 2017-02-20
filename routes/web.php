<?php

Route::get('/', 'BookController@showIndex');

Route::get('/add', 'BookController@showAdd');

Route::get('/edit/{id}', 'BookController@showEdit');

Route::get('/delete/{id}', 'BookController@doDelete');

Route::post('/edit', 'BookController@doEdit');

Route::get('/search', 'BookController@showSearch');

Route::post('/search', 'BookController@doSearch');