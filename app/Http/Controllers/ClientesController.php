<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Model\Cliente;

class ClientesController extends Controller
{
	private $cliente;        
    
    public function __construct(ClienteRepositoryInterface $cliente)
    {
        $this->cliente = $cliente;
    }

	public function index()
	{
		$clientes = $this->cliente->obtenerTodos();
		return view ('clientes.index', compact('clientes'));
	}

	public function create()
    {
    	return view('clientes.create');	
    }

	public function store(ClienteRequest $request)
    {    
        $data = $request->only(['nombre']);        
        $this->cliente->registrar($data); 
        return redirect()->route('clientes.index');
    }  

    public function edit($id)  
    {
        $cliente = $this->cliente->obtener($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request)
    {
        $data = $request->only(['nombre', 'id']);               
        $this->cliente->actualizar($data);
        return redirect()->route('clientes.index');                      
    }  
}
