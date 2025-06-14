<?php

namespace App\Livewire\Empleados;

use App\Models\Empleado;
use Livewire\Component;

class ListarEmpleadosGrid extends Component
{
    public $buscar = '';

    public function render()
    {
        try {
            $empleados = $this->buscar ? Empleado::where('nombre_completo', 'LIKE', '%'.$this->buscar.'%')
                    ->orWhere('departamento', 'LIKE', '%'.$this->buscar.'%')
                    ->get() : Empleado::all();
        
            return view('layouts.empleados.listar-grid', compact('empleados'))
                ->extends('dashboard')
                ->section('content');
        } catch (\Exception $e) {
            // return redirect()->back()->with('error-db', 'Error al dar de alta el empleado: ' . $e->getMessage());
        }
        
    }
}
