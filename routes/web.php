<?php

define('FLASH_SUCCESS', 'success');
define('FLASH_ERROR', 'error');
define('ENHORABUENA', 'Enhorabuena!!');
define('PRODUCTO_REGISTRADO', 'Producto registrado con éxito');
define('PRODUCTO_NO_REGISTRADO', 'Ha sido imposible registrar un nuevo producto');
define('PRODUCTO_NO_ENCONTRADO', 'Ha sido imposible encontrar el producto seleccionado');
define('PRODUCTO_NO_ACTUALIZADO', 'Ha sido imposible actualizar el producto seleccionado');
define('PRODUCTO_ACTUALIZADO', 'Producto actualizado correctamente');
define('ERROR', 'Error!!');
define('CLIENTE_REGISTRADO', 'Cliente registrado con éxito');
define('CLIENTE_NO_REGISTRADO', 'Ha sido imposible registrar un nuevo cliente');
define('CLIENTE_NO_ENCONTRADO', 'Ha sido imposible encontrar el cliente seleccionado');
define('CLIENTE_NO_ACTUALIZADO', 'Ha sido imposible actualizar el cliente seleccionado');
define('CLIENTE_ACTUALIZADO', 'Cliente actualizado correctamente');
define('TECNICO_REGISTRADO', 'Técnico registrado con éxito');
define('TECNICO_NO_REGISTRADO', 'Ha sido imposible registrar un nuevo técnico');
define('TECNICO_NO_ENCONTRADO', 'Ha sido imposible encontrar el técnico seleccionado');
define('TECNICO_NO_ACTUALIZADO', 'Ha sido imposible actualizar el técnico seleccionado');
define('TECNICO_ACTUALIZADO', 'Técnico actualizado correctamente');
define('ENTRADA_REGISTRADA', 'Entrada registrada con éxito');
define('ENTRADA_NO_REGISTRADA', 'Ha sido imposible registrar una nueva entrada');
define('ENTRADA_ACTUALIZADA', 'Entrada actualizada con éxito');
define('ENTRADA_NO_ACTUALIZADA', 'Ha sido imposible actualizar la entrada seleccionada');
define('ENTRADA_BORRADA', 'Entrada eliminada con éxito');
define('ENTRADA_NO_BORRADA', 'Ha sido imposible eliminar la entrada seleccionada');
define('ENTRADA_ENTREGADA', 'Entrada entregada con éxito');
define('ENTRADA_NO_ENTREGADA', 'Ha sido imposible marcar la entrada seleccionada como entregada');
define('PENDIENTE', 'P');
define('ENTREGADA', 'E');
define('REPARADA', 'R');

Route::get('/', function () {
    return redirect('entradas-pendientes');
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

// Rutas de entradas
Route::get('/entradas-pendientes', 'EntradasPendientesController@index')->name('entradas-pendientes.index');
Route::get('/entrada', 'EntradasPendientesController@create')->name('entrada.create');
Route::post('/entrada', 'EntradasPendientesController@store')->name('entrada.store');
Route::get('/entrada/{id}', 'EntradasPendientesController@edit')->name('entrada.edit');
Route::put('/entrada', 'EntradasPendientesController@update')->name('entrada.update');
Route::get('/entrada/{id}/reparada', 'EntradasReparadasController@create')->name('entrada-reparada.create');
Route::post('/entrada-reparada', 'EntradasReparadasController@store')->name('entrada-reparada.store');
Route::post('/borrar-entrada', 'EntradasPendientesController@destroy');
Route::get('/entradas-reparadas', 'EntradasReparadasController@index')->name('entradas-reparadas.index');
Route::post('/entrada-entregada', 'EntradasReparadasController@entregada');
Route::get('/entrada-reparada/{id}', 'EntradasReparadasController@edit')->name('entrada-reparada.edit');
Route::put('/entrada-reparada', 'EntradasReparadasController@update')->name('entrada-reparada.update');
Route::get('/entradas-entregadas', 'EntradasEntregadasController@index')->name('entradas-entregadas.index');
Route::post('/entradas-entregadas', 'EntradasEntregadasController@list')->name('entradas-entregadas.list');
Route::get('/entrada-entregada/{id}', 'EntradasEntregadasController@show')->name('entrada-entregada.show');

