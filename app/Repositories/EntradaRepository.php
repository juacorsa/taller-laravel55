<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Model\Entrada;
use Carbon\Carbon;

class EntradaRepository implements EntradaRepositoryInterface
{
	private $modelo;

	public function __construct(Entrada $modelo)
	{
		$this->modelo = $modelo;
	}
	
	public function obtenerEntradasPendientes()
	{
		return $this->modelo::with('cliente')
			->with('producto')
			->with('tecnico')
			->where('estado', PENDIENTE)
			->orderBy('fecha_entrada','desc')
			->get();				
	}

	public function obtenerEntradasEntregadas($año)
	{
		return $this->modelo::with('cliente')
			->with('producto')
			->with('tecnico')
			->where('estado', ENTREGADA)
			->whereYear('fecha_entrega', $año)
			->orderBy('fecha_entrega','desc')
			->get();					
	}

	public function obtenerEntradasReparadas()
	{
		return $this->modelo::with('cliente')
			->with('producto')
			->with('tecnico')
			->where('estado', REPARADA)
			->orderBy('fecha_reparacion','desc')
			->get();						
	}	

	public function registrar(array $data)
	{		
		$data['fecha_entrada'] = now(); 
		return $this->modelo->create($data);
	}

	public function obtener($id)
	{		
		return $this->modelo::with('cliente')
			->with('producto')
			->find($id);
	}

	public function actualizar(array $data)
	{
		return $this->modelo->find($data['id'])->update($data);
	}	

	public function reparar(array $data)
	{
		$data['estado']	= REPARADA;
		$data['fecha_reparacion'] = now(); 
		return $this->modelo->find($data['id'])->update($data);		
	}

	public function entregar($id, $desde)
	{
		$data['estado']	= ENTREGADA;
		$data['fecha_entrega'] = Carbon::now()->subDay($desde);		
		return $this->modelo->find($id)->update($data);		
	}	

	public function borrar($id)
	{
		$this->modelo->find($id)->delete();	
	}
}

