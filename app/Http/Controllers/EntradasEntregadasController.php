<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Repositories\Interfaces\TecnicoRepositoryInterface;
use Carbon\Carbon;

class EntradasEntregadasController extends Controller
{
    private $entrada; 
    private $desde;   
    
    public function __construct(
        EntradaRepositoryInterface $entrada, 
        ClienteRepositoryInterface $cliente,
        ProductoRepositoryInterface $producto,
        TecnicoRepositoryInterface $tecnico)
    {
        $this->entrada  = $entrada;
        $this->cliente  = $cliente;
        $this->producto = $producto;
        $this->tecnico  = $tecnico;
        $this->desde    = 2016;
        Carbon::setLocale('es');
    }
    
    public function index()    
    {
		$año  = Carbon::today()->year;
		$años = array_combine(range($this->desde, $año), range($this->desde, $año));	
    	$entradas = $this->entrada->obtenerEntradasEntregadas($año);
        return view('entradas-entregadas.index', compact('entradas', 'año', 'años'));
    }

    public function list(Request $request)
    {
    	$año = $request->año;		
    	$añoActual  = Carbon::today()->year;
		$años = array_combine(range($this->desde, $añoActual), range($this->desde, $añoActual));	
    	$entradas = $this->entrada->obtenerEntradasEntregadas($año);
        return view('entradas-entregadas.index', compact('entradas', 'año', 'años'));
    }

    public function show($id)
    {
    	$entrada = $this->entrada->obtener($id);    	
    	$desdeFechaEntrada    = Carbon::parse($entrada->fecha_entrada)->diffForHumans();
    	$desdeFechaReparacion = Carbon::parse($entrada->fecha_reparacion)->diffForHumans();
    	$desdeFechaEntrega    = Carbon::parse($entrada->fecha_entrega)->diffForHumans();    	
    	return view('entradas-entregadas.show', compact('entrada', 'desdeFechaEntrada', 'desdeFechaReparacion', 'desdeFechaEntrega'));	
    }   
    
}
