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
            'telefono' => ['nullable', 'string', 'max:15'],
            'correo' => [
                'required',
                'string',
                'email',
                Rule::unique(Proveedor::class)->ignore($idProveedor),
                'min:3',
                'max:120',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre del cliente es obligatorio.',
            'nombre_completo.min' => 'El nombre del proveedor no puede tener menos de 3 caracteres.',
            'nombre_completo.max' => 'El nombre del proveedor no puede ser tan largo.',
            'cif.required' => 'El CIF del cliente es obligatorio.',
            'cif.min' => 'Introduce un CIF válido.',
            'cif.max' => 'Introduce un CIF válido.',
            'cif.unique' => 'El CIF especificado ya se encuentra registrado.',
            'razon_social.required' => 'La razón social es obligatoria.',
            'razon_social.min' => 'La razón social debe ser mayor a 3 caracteres.',
            'razon_social.max' => 'La razón social no puede ser superior a 12 caracteres.',
            'domicilio.required' => 'El domicilio del proveedor es obligatorio.',
            'domicilio.min' => 'El domicilio del proveedor no puede tener menos de 3 caracteres.',
            'domicilio.max' => 'El domicilio del proveedor no puede ser tan largo.',
            'cod_postal.required' => 'El codigo postal es obligatorio.',
            'poblacion.required' => 'La población del domicilio fiscal es obligatoria.',
            'provincia.required' => 'La provincia del domicilio fiscal es obligatoria.',
            'correo.required' => 'Un correo de contacto es obligatorio.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
        ];
    }
}
