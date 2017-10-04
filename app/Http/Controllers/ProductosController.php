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
            $this->producto->registrar($data);   
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', PRODUCTO_REGISTRADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
            return redirect()->route('productos.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', PRODUCTO_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }      
    }

    public function edit($id)
    {      
        $producto = $this->producto->obtener($id);

        if (!$producto) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', PRODUCTO_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }

        return view('productos.edit', compact('producto'));
    }

    public function update(ProductoRequest $request)
    {
        $data = $request->only(['nombre', 'id']);                       

        try
        {
            $this->producto->actualizar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', PRODUCTO_ACTUALIZADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);                       
            return redirect()->route('productos.index'); 
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', PRODUCTO_NO_ACTUALIZADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }                     
    }
}
