<?php

namespace App\Http\Requests;

use App\Models\Producto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'categoria' => ['required', 'string'],
            'precio_venta' => ['required', 'numeric', 'min:0'],
            'iva' => ['required', 'numeric', 'between:0,25'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            

        ];
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'El código del producto es obligatorio.',
            'codigo.unique' => 'Este código ya está registrado.',
            'nombre.required' => 'Por favor, incluye un nombre de producto.',
            'categoria.required' => 'Selecciona una categoria',
            'precio_venta.required' => 'Es obligatorio incluir el precio de venta por unidad.',
            'precio_venta.numeric' => 'Introduce un valor numérico válido.',
            'iva.required' => 'Incluye el porcentaje (%) de iva del género.',
            'iva.numeric' => 'Introduce un valor numérico válido.',
        ];
    }
}
