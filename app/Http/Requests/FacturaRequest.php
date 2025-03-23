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
            'fecha_emision' => ['required', 'date'],
            'monto_total' => ['required', 'numeric', 'min:0'],
            'estado' => [
                'required',
                'string',
                Rule::in(['pendiente', 'pagada', 'cancelada']),
            ],
        ];
    }
}
