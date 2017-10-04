<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;
use App\Repositories\Interfaces\EntradaRepositoryInterface;
use App\Model\Entrada;
use Session;
use Exception;

class EntradasPendientesController extends Controller
{
    private $entrada;        
    
    public function __construct(EntradaRepositoryInterface $entrada)
    {
        $this->entrada = $entrada;
    }

    public function index()
    {
        return view('entradas-pendientes.index');
    }

    
}
