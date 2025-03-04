<?php

namespace App\Livewire\Empleados;

use App\Models\Empleado;
use Livewire\Component;
use Livewire\WithPagination;

class ListarEmpleados extends Component
{
    use WithPagination;


    public function render()
    {
        $empleados = Empleado::paginate(15);

        return view('layouts.empleados.listar', compact('empleados'))
            ->extends('dashboard')
            ->section('content');
    }
}
