<?php

namespace App\Livewire\Proveedores;

use App\Models\Proveedor;
use Livewire\Component;

class ListarProveedoresGrid extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $proveedores = $this->buscar ? Proveedor::where('nombre', 'LIKE', '%'.$this->buscar.'%')->orWhere('cif', 'LIKE', '%'.$this->buscar.'%')->get() : Proveedor::all();

        return view('layouts.proveedores.listar-grid', compact('proveedores'))
            ->extends('dashboard')
            ->section('content');
    }
}
