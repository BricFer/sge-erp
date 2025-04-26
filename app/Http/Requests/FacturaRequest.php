<?php

namespace App\Http\Requests;

use App\Models\Factura;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FacturaRequest extends FormRequest
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
        $facturaId = $this->route('factura') ? $this->route('factura')->id : null;

        return [
            'facturable_id' => ['required', 'integer'],
            'facturable_type' => ['required', 'string'],
            'serie' => [
                'required',
                'string',
                'max:255',
                Rule::unique(Factura::class)->ignore($facturaId),
            ],
            'id_empleado' => [
                'required',
                Rule::exists('empleados', 'id'),
            ],
            'porcentaje_descuento',
            'fecha_emision' => ['date'],
            'monto_subtotal' => ['required', 'numeric', 'min:0'],
            'monto_descuento' => ['required', 'numeric', 'min:0'],
            'monto_iva' => ['required', 'numeric', 'min:0'],
            'monto_total' => ['required', 'numeric', 'min:0'],
            'estado' => [
                'string',
                Rule::in(['borrador', 'emitida', 'pendiente', 'cancelada', 'pagada']),
            ],
            'id_almacen' => ['required', 'integer'],

            // Validación de detalles productos (Array)
            'id_producto' => ['required', 'array', 'min:1'],
            'id_producto.*' => [
                'required',
                Rule::exists('productos', 'id'),
            ],
            'precio' => ['required', 'array', 'min:1'],
            'precio.*' => ['required', 'numeric', 'min:0'],
            'iva' => ['required', 'array'],
            'iva.*' => ['required', 'numeric', 'min:0'],
            'cantidad' => ['required', 'array', 'min:1'],
            'cantidad.*' => ['required', 'numeric', 'min:1'],
            'subtotal' => ['required', 'array', 'min:1'],
            'subtotal.*' => ['required', 'numeric', 'min:0'],

            // Validación de detalles servicios (Array)
            // 'detalles' => ['required', 'array', 'min:1'],
            // 'detalles.*.id_servicio' => [
            //     'required',
            //     Rule::exists('servicios', 'id'),
            // ],
            // 'detalles.*.fecha_inicio' => ['required', 'date'],
            // 'detalles.*.fecha_fin' => ['nullable', 'date', 'after_or_equal:detalles.*.fecha_inicio'],
            // 'detalles.*.estado' => [
            //     'required',
            //     'string',
            //     Rule::in(['activo', 'pendiente', 'completado']),
            // ],
            // 'detalles.*.prioridad' => [
            //     'required',
            //     'string',
            //     Rule::in(['alta', 'media', 'baja']),
            // ],
            // 'detalles.*.descuento' => ['required', 'numeric', 'min:0'],
            // 'detalles.*.subtotal' => ['required', 'numeric', 'min:0'],
            // Tal como está mi formulario los inputs que corresponden a los detalles guardan la información de la siguiente forma:
            // estado[], descuento[], etc.
            // La validación comentada arriba sirve en caso que los inpust tengan la siguiente estructura
            // detalles[0].estado, detalles[0].descuento, etc
        ];
    }
}
