<?php

namespace App\Repositories\Interfaces;

use App\Model\Entrada;

interface EntradaRepositoryInterface 
{
	public function obtenerEntradasPendientes();

	public function obtenerEntradasReparadas();

	public function obtenerEntradasEntregadas($año);	

	public function registrar(array $datos);
	
	public function actualizar(array $datos);

	public function obtener($id);

	public function reparar(array $datos);

	public function entregar($id, $desde);

	public function borrar($id);
	
}
