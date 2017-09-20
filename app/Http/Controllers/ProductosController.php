<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Http\Requests\ProductoRequest;
use App\Model\Producto;

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
        $this->producto->registrar($data); 

        return redirect()->route('productos.index');
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
