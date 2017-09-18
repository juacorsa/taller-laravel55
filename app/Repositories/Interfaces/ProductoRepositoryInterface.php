<?php

namespace App\Repositories\Interfaces;

use App\Model\Producto;

interface ProductoRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $data);

	public function actualizar($id, array $data);
	
	public function obtener($id);
}
