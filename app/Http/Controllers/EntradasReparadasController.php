<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Repositories\Interfaces\ClienteRepositoryInterface;
use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Repositories\Interfaces\TecnicoRepositoryInterface;
use App\Http\Requests\EntradaRequest;
use Session;
use Exception;

class EntradasReparadasController extends Controller
{
    private $entrada;    
    
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
    	$entradas = $this->entrada->obtenerEntradasReparadas();
        return view('entradas-reparadas.index', compact('entradas'));
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

    public function entregada(Request $request)
    {
        try 
        {
            $this->entrada->entregar($request->id, $request->desde);
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

    public function edit($id)
    {
        $entrada   = $this->entrada->obtener($id);
        $clientes  = $this->cliente->obtenerTodos();
        $productos = $this->producto->obtenerTodos();
        $tecnicos  = $this->tecnico->obtenerTodos();        
        return view('entradas-reparadas.edit', compact('entrada', 'clientes', 'productos', 'tecnicos'));
    }

    public function update(EntradaRequest $request)    
    {
        $data = $request->only(['cliente_id', 'producto_id', 'tecnico_id', 'usuario', 'averia', 
        'solucion', 'modelo', 'accesorios', 'id', 'comentario', 'solucion', 'horas']);

        try 
        {            
            $this->entrada->actualizar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', ENTRADA_ACTUALIZADA);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
            return redirect()->route('entradas-reparadas.index');
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
}
