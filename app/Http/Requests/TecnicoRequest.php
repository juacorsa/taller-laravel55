<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:80|unique:tecnicos'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del técnico es un dato obligatorio.',
            'nombre.max'      => 'El nombre del técnico debe tener como máximo 80 caracteres.',
            'nombre.unique'   => 'El técnico indicado ya existe en la base de datos'
        ];
    }
}
