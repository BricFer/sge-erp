<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required | min:3 | max:120',
            'apellido' => 'required | min:3 | max:120',
            'nif' => 'required | max:12',
            'domicilio' => 'required | min:3 | max:255',
            'cod_postal' => 'required | max:12',
            'poblacion' => 'required | max:25',
            'provincia' => 'required | max:25',
            'telefono',
            'correo' => 'required | min:5 | max:120'
        ];
    }
}
