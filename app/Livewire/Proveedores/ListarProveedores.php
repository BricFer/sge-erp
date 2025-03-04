<?php

namespace App\Livewire\Proveedores;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class ListarProveedores extends Component
{
    use WithPagination;


    public function render()
    {
        $proveedores = Proveedor::paginate(15);

        return view('layouts.proveedores.listar', compact('proveedores'))
            ->extends('dashboard')
            ->section('content');
    }
}
