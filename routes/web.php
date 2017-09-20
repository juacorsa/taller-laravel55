<?php

Route::get('/', function () {
    return view('welcome');
});



Route::get('/productos', 'ProductosController@index')->name('productos.index');
Route::get('/producto', 'ProductosController@create')->name('producto.create');
Route::post('/producto', 'ProductosController@store')->name('producto.store');
Route::get('/producto', 'ProductosController@create')->name('producto.create');
Route::get('/producto/{id}', 'ProductosController@edit')->name('producto.edit');
Route::put('/producto', 'ProductosController@update')->name('producto.update');





Route::get('/tecnicos', 'TecnicosController@index')->name('tecnicos.index');
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
