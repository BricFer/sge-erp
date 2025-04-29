<?php

namespace App\Livewire\Facturas\Ventas;

use App\Models\Factura;
use Livewire\Component;

class ListarFacturasVentas extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $type = 'Cliente';
        $facturas = $this->buscar ? Factura::where('serie', 'LIKE', '%'.$this->buscar.'%')->orWhere('fecha_emision', 'LIKE', '%'.$this->buscar.'%')->get() : Factura::where('facturable_type', 'LIKE', '%'.$type)->get();

        return view('layouts.facturas.ventas.listar', compact(['facturas']))
            ->extends('dashboard')
            ->section('content');
    }
}
