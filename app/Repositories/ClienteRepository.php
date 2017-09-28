<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Model\Cliente;

class ClienteRepository implements ClienteRepositoryInterface
{
	private $modelo;

	public function __construct(Cliente $modelo)
	{
		$this->modelo = $modelo;
	}

	public function obtenerTodos()
	{
		return $this->modelo->orderBy('nombre','asc')->get();
	}

	public function registrar(array $data)
	{
        return $this->modelo->create($data);
	}

	public function actualizar(array $data)
	{		
		return $this->modelo->find($data['id'])->update($data);
	}

	public function obtener($id)
	{
		return $this->modelo->find($id);
	}
	
}
