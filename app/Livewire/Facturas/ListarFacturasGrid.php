<?php

namespace App\Livewire\Facturas;

use App\Models\Factura;
use Livewire\Component;

class ListarFacturasGrid extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        /*$facturas = $this->buscar ? Factura::where('serie', 'LIKE', '%'.$this->buscar.'%')->orWhere('estado', 'LIKE','%'.$this->buscar.'%')->get() : Factura::all(); */
        
        return view('layouts.facturas.listar-grid', compact('facturas'))
            ->extends('dashboard')
            ->section('content');
    }
}
