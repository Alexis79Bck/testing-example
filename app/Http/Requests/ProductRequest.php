<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
            'costo' => 'required|numeric|min:0',
            'cantidad' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'tipo.required' => 'El campo tipo es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'cantidad.required' => 'El campo cantidad es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de caracteres.',
            'tipo.string' => 'El campo tipo debe ser una cadena de caracteres.',
            'costo.numeric' => 'El campo costo debe ser un número.',
            'costo.min' => 'El campo costo no debe ser un número negativo.', 
            'cantidad.numeric' => 'El campo cantidad debe ser un número.',  
            'cantidad.min' => 'El campo cantidad no debe ser un número negativo.', 
        ];
    }
}
