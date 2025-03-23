<?php

namespace App\Http\Requests;

use App\Models\Producto;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
        $productoId = $this->route('producto') ? $this->route('producto')->id : null;

        return  [
            'codigo' => [
                'required',
                'string',
                Rule::unique(Producto::class)->ignore($productoId),
                'min:3',
                'max:255'],
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'precio_compra' => ['required'],
            'precio_venta' => ['required'],
            'iva' => ['required'],
            'descripcion' => ['string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Por favor, incluye un nombre de producto.',
            'precio_compra.required' => 'Es obligatorio incluir el precio de compra por unidad.',
            'precio_venta.required' => 'Es obligatorio incluir el precio de venta por unidad.',
            'iva.required' => 'Incluye el porcentaje (%) de iva del género.',
        ];
    }
}
