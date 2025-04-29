<?php

namespace App\Livewire\Facturas\Compras;

use App\Models\Factura;
use Livewire\Component;

class ListarFacturasCompras extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $type = 'Proveedor';
        $facturas = $this->buscar
                ? Factura::where('serie', 'LIKE', '%'.$this->buscar.'%')->orWhere('fecha_emision', 'LIKE', '%'.$this->buscar.'%')->get()
                : Factura::where('facturable_type', 'LIKE', '%'.$type)->get();

        return view('layouts.facturas.compras.listar', compact(['facturas']))
            ->extends('dashboard')
            ->section('content');
    }
}
