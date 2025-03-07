<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'rol' => ['required', 'string', 'min:3', 'max:120'],
            'telefono' => ['required', 'string'],
            'correo' => ['required', 'string','unique:empleados,correo', 'min:3', 'max:120']
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del empleado es obligatorio.',
            'rol.required' => 'Es obligatorio el cargo que ocupa el empleado.',
            'telefono.required' => 'Es obligatorio un telefono de contacto.',
            'correo.required' => 'Es obligatorio un correo de contacto.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
        ];
    }
}
