<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Model\Producto;

class ProductoRepository implements ProductoRepositoryInterface
{
	private $modelo;

	public function __construct(Producto $modelo)
	{
		$this->modelo = $modelo;
	}

	public function obtenerTodos()
	{
		return $this->modelo->orderBy('nombre','asc');
	}

	public function registrar(array $data)
	{
        return $this->modelo->create($data);
	}

	public function actualizar($id, array $data)
	{
		return $this->model->find($id)->update($data);
	}

	public function obtener($id)
	{
		return $this->modelo->find($id);
	}

	
}