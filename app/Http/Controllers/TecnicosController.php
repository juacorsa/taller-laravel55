<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TecnicoRequest;
use App\Repositories\Interfaces\TecnicoRepositoryInterface;
use App\Model\Tecnico;

class TecnicosController extends Controller
{
    private $tecnico;        
    
    public function __construct(TecnicoRepositoryInterface $tecnico)
    {
        $this->tecnico = $tecnico;
    }

    public function index()    
    {
        $tecnicos = $this->tecnico->obtenerTodos();
    	return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
    	return view('tecnicos.create');	
    }

	public function store(TecnicoRequest $request)
    {    
        $data = $request->only(['nombre']);        
        $this->tecnico->registrar($data); 
        return redirect()->route('tecnicos.index');
    }  

    public function edit($id)  
    {
        $tecnico = $this->tecnico->obtener($id);
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(TecnicoRequest $request)
    {
        $data = $request->only(['nombre', 'id']);               
        $this->tecnico->actualizar($data);
        return redirect()->route('tecnicos.index');                      
    }
}
