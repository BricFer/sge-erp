<?php

namespace App\Livewire\Facturas;

use App\Models\Factura;
use Livewire\Component;

class ListarFacturas extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $facturas = $this->buscar ? Factura::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Factura::all();
        // Revisar la relación para que muestre el cliente/proveedor
        /* $facturas = Factura::with('empleados') // Cargar relación de empleado
                    ->when($this->buscar, function ($query) {
                        // when($this->buscar, function ($query) { ... }) → Filtra solo si hay una búsqueda.
                        $query->where('nombre', 'LIKE', '%'.$this->buscar.'%')
                            ->orWhere('ubicacion', 'LIKE', '%'.$this->buscar.'%');
                    })
                    ->get(); */

        return view('layouts.facturas.listar', compact(['facturas']))
            ->extends('dashboard')
            ->section('content');
    }
}
