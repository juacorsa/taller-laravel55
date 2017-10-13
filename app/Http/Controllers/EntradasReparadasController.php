<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Http\Requests\EntradaRequest;
use App\Model\Entrada;
use Session;
use Exception;

class EntradasReparadasController extends Controller
{
    private $entrada;    
    
    public function __construct(EntradaRepositoryInterface $entrada)
    {
        $this->entrada = $entrada;
    }

    public function index()    
    {
    	//$entradas = $this->entrada->obtenerEntradasPendientes();
        //return view('entradas-pendientes.index', compact('entradas'));
    }

    public function create($id)    
    {
    	$entrada = $this->entrada->obtener($id);
    	return view('entradas-reparadas.create', compact('entrada'));
    }  

    public function store(EntradaRequest $request)  
    {
    	$data = $request->only(['solucion', 'comentario', 'horas']);
    	$data['id'] = $request['id'];
    	$this->entrada->reparar($data);
    	$entradas = $this->entrada->obtenerEntradasPendientes();
        return view('entradas-pendientes.index', compact('entradas'));
    }
}
