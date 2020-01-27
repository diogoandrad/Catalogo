<?php

Route::get('/', 'CatalogoController@index');

Route::get('/criar', 'CatalogoController@create');

Route::post('/searchContato', 'CatalogoController@searchContato')->name('contato.searchContato');

Route::resource('contato', 'CatalogoController');
