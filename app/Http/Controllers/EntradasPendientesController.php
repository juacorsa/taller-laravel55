<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Repositories\Interfaces\TecnicoRepositoryInterface;
use App\Model\Entrada;
use Session;
use Exception;

class EntradasPendientesController extends Controller
{
    private $entrada;    
    private $cliente; 
    private $producto;   
    private $tecnico;
    
    public function __construct(
    	EntradaRepositoryInterface $entrada, 
    	ClienteRepositoryInterface $cliente,
    	ProductoRepositoryInterface $producto,
    	TecnicoRepositoryInterface $tecnico)
    {
        $this->entrada = $entrada;
        $this->cliente = $cliente;
        $this->producto = $producto;
        $this->tecnico = $tecnico;
    }

    public function index()    
    {
    	$entradas = $this->entrada->obtenerEntradasPendientes();
        return view('entradas-pendientes.index', compact('entradas'));
    }

    public function create()    
    {
    	$clientes  = $this->cliente->obtenerTodos();
    	$productos = $this->producto->obtenerTodos();
    	$tecnicos  = $this->tecnico->obtenerTodos();
    	return view('entradas-pendientes.create', compact('clientes', 'productos', 'tecnicos'));
    }

    public function store(EntradaRequest $request)
    {
    	$data = $request->only(['cliente_id', 'producto_id', 'tecnico_id', 'usuario', 'averia', 
    	'solucion', 'modelo', 'accesorios', 'comentario']);

        try 
        {            
        	$this->entrada->registrar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', ENTRADA_REGISTRADA);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
        	return redirect()->route('entradas-pendientes.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', ENTRADA_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }
    }

    public function edit($id)
    {
		$entrada   = $this->entrada->obtener($id);
    	$clientes  = $this->cliente->obtenerTodos();
    	$productos = $this->producto->obtenerTodos();
    	$tecnicos  = $this->tecnico->obtenerTodos();		
		return view('entradas-pendientes.edit', compact('entrada', 'clientes', 'productos', 'tecnicos'));
    }

	public function update(EntradaRequest $request)    
	{
    	$data = $request->only(['cliente_id', 'producto_id', 'tecnico_id', 'usuario', 'averia', 
    	'solucion', 'modelo', 'accesorios', 'id', 'comentario']);

        try 
        {            
        	$this->entrada->actualizar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', ENTRADA_ACTUALIZADA);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
        	return redirect()->route('entradas-pendientes.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', ENTRADA_NO_ACTUALIZADA);            
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }
	}  

    public function destroy(Request $request)  
    {
        try 
        {
            $this->entrada->borrar($request->id);
            return response()->json([
                'mensaje' => ENTRADA_ENTREGADA,
                'titulo'  => ENHORABUENA
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'mensaje' => ENTRADA_NO_ENTREGADA,
                'titulo'  => ERROR
            ]);
        }
    }
}
