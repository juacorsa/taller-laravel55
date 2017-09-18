<?php

Route::get('/', function () {
    return view('welcome');
});



Route::get('/productos', 'ProductosController@index')->name('productos.index');
Route::get('/producto', 'ProductosController@create')->name('producto.create');
Route::post('/producto', 'ProductosController@store')->name('producto.store');









Route::get('/tecnicos', 'TecnicosController@index')->name('tecnicos.index');
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
