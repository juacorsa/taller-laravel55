<?php

namespace App\Repositories\Interfaces;

use App\Model\Producto;

interface ProductoRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $datos);

	public function actualizar(array $datos);
	
	public function obtener($id);
}

