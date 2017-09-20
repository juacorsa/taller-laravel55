<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:80|unique:clientes'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del cliente es un dato obligatorio.',
            'nombre.max'      => 'El nombre del cliente debe tener como máximo 80 caracteres.',
            'nombre.unique'   => 'El cliente indicado ya existe en la base de datos'
        ];
    }
}
