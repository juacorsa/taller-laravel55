<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Http\Requests\ProductoRequest;
use App\Model\Producto;
use Session;
use Exception;

class ProductosController extends Controller
{
    private $producto;        
    
    public function __construct(ProductoRepositoryInterface $producto)
    {
        $this->producto = $producto;
    }

    public function index()
    {
    	$productos = $this->producto->obtenerTodos();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {        
        return view('productos.create');    
    }

    public function store(ProductoRequest $request)
    {    
        $data = $request->only(['nombre']);        
        try 
        {
            //throw new Exception('División por cero.');
            $this->producto->registrar($data);             
            Session::flash('flash_mensaje', 'Producto registrado con éxito');
            Session::flash('flash_titulo', 'Enhorabuena!!');
            Session::flash('flash_tipo', 'success');           
            return redirect()->route('productos.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_mensaje', 'Ha sido imposible registrar un nuevo producto');
            Session::flash('flash_titulo', 'Error!!');
            Session::flash('flash_tipo', 'error');           
            return back();
        }      
    }

    public function edit($id)
    {      
        $producto = $this->producto->obtener($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(ProductoRequest $request)
    {
        $data = $request->only(['nombre', 'id']);               
        $this->producto->actualizar($data);
        return redirect()->route('productos.index');              
    }

}
