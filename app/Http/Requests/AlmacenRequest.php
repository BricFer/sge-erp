<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlmacenRequest extends FormRequest
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
            'ubicacion' => ['required', 'string', 'min:3', 'max:255'],
            'capacidad' => ['nullable', 'numeric', 'min:0'], // min:0 se agrega para indicar que ha de ser un valor positivo
            'estado' => ['required', 'string', 'min:3'],
            'id_empleado' => ['nullable', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Es obligatorio el nombre/alias del almacen.',
            'nombre.min' => 'Introduce un nombre válido.',
            'nombre.max' => 'El nombre es demasiado largo.',
            'ubicacion.required' => 'Es obligatoria la ubicación del almacen.',
            'ubicacion.min' => 'Introduce una ubicación válido.',
            'ubicacion.max' => 'La ubicación es demasiado larga.',
            'capacidad.numeric' => 'Introduce un valor válido.'
        ];
    }
}
