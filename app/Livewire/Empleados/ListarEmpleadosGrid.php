<?php

namespace App\Livewire\Empleados;

use App\Models\Empleado;
use Livewire\Component;

class ListarEmpleadosGrid extends Component
{
    public $buscar = '';

    public function render()
    {
        $empleados = $this->buscar ? Empleado::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Empleado::all();
        
        return view('layouts.empleados.listar-grid', compact('empleados'))
            ->extends('dashboard')
            ->section('content');
    }
}
