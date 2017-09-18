<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:80|unique:productos'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre producto es un dato obligatorio.',
            'nombre.max'      => 'El producto debe tener como máximo 80 caracteres.',
            'nombre.unique'   => 'El producto indicado ya existe en la base de datos'
        ];
    }


}
