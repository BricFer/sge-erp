<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'cif' => ['required', 'string', 'min:3', 'max:12'],
            'domicilio' => ['required', 'string', 'min:3', 'max:255'],
            'cod_postal' => ['required', 'string', 'min:3', 'max:12'],
            'poblacion' => ['required', 'string', 'min:3', 'max:25'],
            'provincia' => ['required', 'string', 'min:3', 'max:25'],
            'telefono' => ['required'],
            'correo' => ['required', 'string', 'min:3', 'max:120'],
        ];
    }
}
