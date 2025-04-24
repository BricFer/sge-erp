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
            'nombre_completo' => ['required', 'string', 'min:3', 'max:255'],
            'nif' => [
                'required',
                'string',
                Rule::unique(Cliente::class)->ignore($clienteId),
                'min:3',
                'max:12',
            ],
            'razon_social' => ['string', 'min:3', 'max:255'],
            'domicilio' => ['required', 'string', 'min:3', 'max:120'],
            'cod_postal' => ['required', 'string', 'min:3', 'max:12'],
            'poblacion' => ['required', 'string', 'min:3', 'max:25'],
            'provincia' => ['required', 'string', 'min:3', 'max:25'],
            'telefono',
            'correo' => [
                'required',
                'string',
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
