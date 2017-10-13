<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'averia'   => 'sometimes|required',
            'solucion' => 'sometimes|required',
            'horas'    => 'sometimes|required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'averia.required'   => 'Falta indicar la avería',
            'horas.required'    => 'Falta indicar el tiempo dedicado',
            'horas.numeric'     => 'El tiempo indicado presenta un error de formato',
            'solucion.required' => 'Falta indicar la solución'
        ];
    }

}
