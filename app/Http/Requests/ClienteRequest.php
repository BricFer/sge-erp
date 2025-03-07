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
            'nombre' => ['required', 'string', 'min:3', 'max:120'],
            'apellido' => ['required', 'string', 'min:3', 'max:120'],
            'nif' => ['required', 'string', 'unique:clientes,nif', 'min:3', 'max:12'],
            'domicilio' => ['required', 'string', 'min:3', 'max:120'],
            'cod_postal' => ['required', 'string', 'min:3', 'max:12'],
            'poblacion' => ['required', 'string', 'min:3', 'max:25'],
            'provincia' => ['required', 'string', 'min:3', 'max:25'],
            'telefono',
            'correo' => ['required', 'string','unique:clientes,correo', 'min:3', 'max:120']
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'apellido.required' => 'El apellido del cliente es obligatorio.',
            'nif.required' => 'El NIF del cliente es obligatorio.',
            'nif.unique' => 'El NIF especificado ya se encuentra registrado.',
            'domicilio.required' => 'El domicilio del cliente es obligatorio.',
            'cod_postal.required' => 'El codigo postal es obligatorio.',
            'poblacion.required' => 'La población a la que pertenece el domicilio es obligatoria.',
            'provincia.required' => 'La provincia a la que pertenece el domicilio es obligatoria.',
            'correo.required' => 'Un correo de contacto es obligatorio.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
        ];
    }
}
