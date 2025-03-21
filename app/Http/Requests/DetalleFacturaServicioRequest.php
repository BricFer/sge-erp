<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleFacturaServicioRequest extends FormRequest
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
            'id_servicio',
            'id_factura',
            'fecha_inicio',
            'fecha_fin',
            'estado' => [
                'required',
                Rule::in(['activo', 'pendiente', 'completado']),
            ],
            'prioridad' => [
                'required',
                Rule::in(['alta', 'media', 'baja']),
            ],
            'descuento',
            'subtotal',
        ];
    }

}
