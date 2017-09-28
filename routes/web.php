<?php

Route::get('/', function () {
    return view('welcome');
});

// Rutas de productos
Route::get('/productos', 'ProductosController@index')->name('productos.index');
Route::get('/producto', 'ProductosController@create')->name('producto.create');
Route::post('/producto', 'ProductosController@store')->name('producto.store');
Route::get('/producto', 'ProductosController@create')->name('producto.create');
Route::get('/producto/{id}', 'ProductosController@edit')->name('producto.edit');
Route::put('/producto', 'ProductosController@update')->name('producto.update');

// Rutas de técnicos
Route::get('/tecnicos', 'TecnicosController@index')->name('tecnicos.index');
Route::get('/tecnico', 'TecnicosController@create')->name('tecnico.create');
Route::post('/tecnico', 'TecnicosController@store')->name('tecnico.store');
Route::get('/tecnico/{id}', 'TecnicosController@edit')->name('tecnico.edit');
Route::put('/tecnico', 'TecnicosController@update')->name('tecnico.update');

// Rutas de clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes.index');
Route::get('/cliente', 'ClientesController@create')->name('cliente.create');
Route::post('/cliente', 'ClientesController@store')->name('cliente.store');
Route::get('/cliente/{id}', 'ClientesController@edit')->name('cliente.edit');
Route::put('/cliente', 'ClientesController@update')->name('cliente.update');
