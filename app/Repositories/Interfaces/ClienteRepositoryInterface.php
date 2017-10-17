<?php

namespace App\Repositories\Interfaces;

use App\Model\Cliente;

interface ClienteRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $datos);

	public function actualizar(array $datos);
	
	public function obtener($id);
}

