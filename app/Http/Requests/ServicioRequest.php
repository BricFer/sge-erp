<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'id_empleado',
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'descripcion' => ['required', 'string', 'min:3', 'max:255'],
            'precio' => 'required',
            'tipo_servicio' => 'required',
        ];
    }
}
