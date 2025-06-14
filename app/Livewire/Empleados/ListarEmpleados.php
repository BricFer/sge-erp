<?php

namespace App\Livewire\Empleados;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;

class ListarEmpleados extends Component
{
    public $buscar = '';

    public function render()
    {
        $empleados = $this->buscar ? Empleado::where('nombre_completo', 'LIKE', '%'.$this->buscar.'%')
                    ->orWhere('departamento', 'LIKE', '%'.$this->buscar.'%')
                    ->get() : Empleado::all();
        
        return view('layouts.empleados.listar', compact('empleados'))
            ->extends('dashboard')
            ->section('content');
    }
}
