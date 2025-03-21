<?php

namespace App\Livewire\Servicios;

use App\Models\Servicio;
use Livewire\Component;

class ListarServiciosGrid extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $servicios = $this->buscar ? Servicio::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Servicio::all();

        return view('layouts.servicios.listar-grid', compact('servicios'))
            ->extends('dashboard')
            ->section('content');
    }
}
