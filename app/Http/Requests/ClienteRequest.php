<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        // Obtiene el ID del cliente actual si está disponible (solo en actualización)
        $clienteId = $this->route('cliente') ? $this->route('cliente')->id : null;

        return [
            'cod_cliente' => [
                'required',
                'string',
                Rule::unique(Cliente::class)->ignore($clienteId),
            ],
            'nombre_completo' => ['required', 'string', 'min:3', 'max:255'],
            'nif' => [
                'required',
                'string',
                Rule::unique(Cliente::class)->ignore($clienteId),
                'min:3',
                'max:12',
            ],
            'razon_social' => ['nullable', 'string', 'min:3', 'max:255'],
            'domicilio' => ['required', 'string', 'min:3', 'max:120'],
            'cod_postal' => ['required', 'string', 'min:3', 'max:12'],
            'poblacion' => ['required', 'string', 'min:3', 'max:25'],
            'provincia' => ['required', 'string', 'min:3', 'max:25'],
            'telefono' => ['nullable', 'string', 'max:15'],
            'correo' => [
                'required',
                'string',
                'email',
                Rule::unique(Cliente::class)->ignore($clienteId),
                'min:3',
                'max:120',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre del cliente es obligatorio.',
            'nombre_completo.min' => 'El nombre del cliente no puede tener menos de 3 caracteres.',
            'nombre_completo.max' => 'El nombre del cliente no puede ser tan largo.',
            'nif.required' => 'El NIF del cliente es obligatorio.',
            'nif.unique' => 'El NIF especificado ya se encuentra registrado.',
            'domicilio.required' => 'El domicilio del cliente es obligatorio.',
            'domicilio.min' => 'El domicilio del cliente no puede tener menos de 3 caracteres.',
            'domicilio.max' => 'El domicilio del cliente no puede ser tan largo.',
            'cod_postal.required' => 'El codigo postal es obligatorio.',
            'poblacion.required' => 'La población a la que pertenece el domicilio es obligatoria.',
            'provincia.required' => 'La provincia a la que pertenece el domicilio es obligatoria.',
            'correo.required' => 'Debes indicar una dirección de correo electrónico.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
        ];
    }
}
