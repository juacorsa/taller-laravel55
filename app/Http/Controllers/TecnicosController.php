<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicosController extends Controller
{
    public function index()
    {
    	return view('tecnicos.index');
    }
}
