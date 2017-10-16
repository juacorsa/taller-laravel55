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

	private function obtenerEntradas($estado)
	{
		return $this->modelo::with('cliente')
			->with('producto')
			->with('tecnico')
			->where('estado', $estado)
			->orderBy('fecha_entrada','desc')
			->get();		
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

		switch ($desde) {
			case 0:
				$data['fecha_entrega'] = now(); 				
				break;

			case 1:
				$data['fecha_entrega'] = Carbon::yesterday();				
				break;
		
			default:
				$data['fecha_entrega'] = Carbon::now()->subDay($desde);
				break;
		}
		
		return $this->modelo->find($id)->update($data);		
	}	

	public function borrar($id)
	{
		$this->modelo->find($id)->delete();	
	}
}

