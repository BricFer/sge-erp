<?php

namespace App\Http\Requests;

use App\Models\Empleado;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpleadoRequest extends FormRequest
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
        $empleadoId = $this->route('empleado') ? $this->route('empleado')->id : null;

        return [
            'legajo' => [
                'required',
                'string',
                Rule::unique(Empleado::class)->ignore($empleadoId),
            ],
            'nombre_completo' => ['required', 'string', 'min:3', 'max:255'],
            'dni_nif' => [
                'required',
                'string',
                Rule::unique(Empleado::class)->ignore($empleadoId),
                'min:3',
                'max:12',
            ],
            'telefono' => ['required', 'string'],
            'correo' => [
                'required',
                'string',
                Rule::unique(Empleado::class)->ignore($empleadoId),
                'min:3',
                'max:120'
            ],
            'cargo' => ['required', 'string', 'min:3', 'max:120'],
            'fecha_contratacion' => ['required', 'date'],
            'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_contratacion'],
            'estado' => [
                'required',
                Rule::in(['activo', 'excendencia', 'baja voluntaria', 'despido']),  // Usando Rule::in() para validar el enum
            ],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre del empleado es obligatorio.',
            'nombre_completo.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre_completo.max' => 'El nombre demasiado extenso.',
            'dni_nif.required' => 'Indica el número de documento del empleado.',
            'dni_nif.min' => 'Numero de documento inválido.',
            'dni_nif.max' => 'Numero de documento inválido.',
            'cargo.required' => 'Es obligatorio indicar el cargo que ocupa el empleado.',
            'cargo.min' => 'El cargo indicado no es válido.',
            'cargo.max' => 'Es obligatorio indicar el cargo que ocupa el empleado.',
            'telefono.required' => 'El cargo indicado no es válido.',
            'correo.required' => 'Es obligatorio un correo de contacto.',
            'correo.unique' => 'El correo electrónico ya se encuentra registrado.',
            'fin.after_or_equal' => 'La fecha de finalización ser anterior a la fecha de contratación.',
        ];
    }
}
