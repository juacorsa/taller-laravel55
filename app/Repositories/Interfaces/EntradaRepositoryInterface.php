<?php

namespace App\Repositories\Interfaces;

use App\Model\Entrada;

interface EntradaRepositoryInterface 
{
	public function obtenerEntradasPendientes();

	public function registrar(array $data);
	
	public function actualizar(array $data);

	public function obtener($id);

	public function reparar(array $data);

	public function borrar($id);
	
}
