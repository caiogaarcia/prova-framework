<?php

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie');

Route::post('/series/criar', 'SeriesController@store');

Route::delete('/series/remover/{id}', 'SeriesController@destroy');

Route::get('/series/{serieId}/temporadas','TemporadasController@index');


