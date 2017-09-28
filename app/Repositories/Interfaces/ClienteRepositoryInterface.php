<?php

namespace App\Repositories\Interfaces;

use App\Model\Cliente;

interface ClienteRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $data);

	public function actualizar(array $data);
	
	public function obtener($id);
}

