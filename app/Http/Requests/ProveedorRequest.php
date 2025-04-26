<?php

namespace App\Http\Requests;

use App\Models\Proveedor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $idProveedor = $this->route('proveedor') ? $this->route('proveedor')->id : null;
        return [
            'cod_proveedor' => [
                'required',
                'string',
                Rule::unique(Proveedor::class)->ignore($idProveedor),
            ],
            'nombre_completo' => ['required', 'string', 'min:3', 'max:255'],
            'cif' => [
                'required',
                'string',
                Rule::unique(Proveedor::class)->ignore($idProveedor),
                'min:3',
                'max:12',
            ],
            'razon_social' => [
                'required',
                'string',
                Rule::unique(Proveedor::class)->ignore($idProveedor),
                'min:3',
                'max:12',
            ],
            'domicilio' => ['required', 'string', 'min:3', 'max:255'],
            'cod_postal' => ['required', 'string', 'min:3', 'max:12'],
            'poblacion' => ['required', 'string', 'min:3', 'max:25'],
            'provincia' => ['required', 'string', 'min:3', 'max:25'],
            'telefono' => ['required'],
            'correo' => [
                'required',
                'string',
                Rule::unique(Proveedor::class)->ignore($idProveedor),
                'min:3',
                'max:120',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'cif.required' => 'El CIF del cliente es obligatorio.',
            'cif.unique' => 'El CIF especificado ya se encuentra registrado.',
            'domicilio.required' => 'El domicilio fiscal del proveedor es obligatorio.',
            'cod_postal.required' => 'El codigo postal es obligatorio.',
            'poblacion.required' => 'La población del domicilio fiscal es obligatoria.',
            'provincia.required' => 'La provincia del domicilio fiscal es obligatoria.',
            'telefono.required' => 'Es obligatorio un teléfono de contacto.',
            'correo.required' => 'Un correo de contacto es obligatorio.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
        ];
    }
}
