<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Model\Cliente;
use Session;
use Exception;

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
        try 
        {            
            $this->cliente->registrar($data); 
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', CLIENTE_REGISTRADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
            return redirect()->route('clientes.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', CLIENTE_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }              
    }  

    public function edit($id)  
    {
        $cliente = $this->cliente->obtener($id);       

        if (!$cliente) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', CLIENTE_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }

        return view('clientes.edit', compact('cliente'));        
    }

    public function update(ClienteRequest $request)
    {
        $data = $request->only(['nombre', 'id']);               
        try
        {
            $this->cliente->actualizar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', CLIENTE_ACTUALIZADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);                       
            return redirect()->route('clientes.index'); 
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', CLIENTE_NO_ACTUALIZADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }                                  
    }  
}
