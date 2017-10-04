<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TecnicoRequest;
use App\Repositories\Interfaces\TecnicoRepositoryInterface;
use App\Model\Tecnico;
use Session;
use Exception;

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
        try 
        {            
            $this->tecnico->registrar($data); 
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', TECNICO_REGISTRADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);           
            return redirect()->route('tecnicos.index');
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', TECNICO_NO_REGISTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }           
    }  

    public function edit($id)  
    {
        $tecnico = $this->tecnico->obtener($id);
        
        if (!$tecnico) 
        {
            Session::flash('flash_swal', '');
            Session::flash('flash_mensaje', TECNICO_NO_ENCONTRADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();            
        }

        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(TecnicoRequest $request)
    {
        $data = $request->only(['nombre', 'id']);                       
        try
        {
            $this->tecnico->actualizar($data);
            Session::flash('flash_toastr', '');          
            Session::flash('flash_mensaje', TECNICO_ACTUALIZADO);
            Session::flash('flash_titulo', ENHORABUENA);
            Session::flash('flash_tipo', FLASH_SUCCESS);                       
            return redirect()->route('tecnicos.index');  
        }
        catch(Exception $e)
        {
            Session::flash('flash_swal', 'swal');
            Session::flash('flash_mensaje', TECNICO_NO_ACTUALIZADO);
            Session::flash('flash_titulo', ERROR);
            Session::flash('flash_tipo', FLASH_ERROR);           
            return back();
        }                                                   
    }
}
