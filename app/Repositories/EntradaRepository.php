<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Model\Entrada;

class EntradaRepository implements EntradaRepositoryInterface
{
	private $modelo;

	public function __construct(Entrada $modelo)
	{
		$this->modelo = $modelo;
	}

	public function obtenerEntradasPendientes()
	{
		//return $this->modelo->orderBy('nombre','asc')->get();
	}

	
}

