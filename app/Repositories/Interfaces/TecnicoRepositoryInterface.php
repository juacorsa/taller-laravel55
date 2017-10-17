<?php

namespace App\Repositories\Interfaces;

use App\Model\Tecnico;

interface TecnicoRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $datos);

	public function actualizar(array $datos);
	
	public function obtener($id);
}

