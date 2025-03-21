<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;

class ListarAlmacenesGrid extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $almacenes = $this->buscar ? Almacen::where('nombre', 'LIKE', '%'.$this->buscar.'%')->orWhere('ubicacion', 'LIKE','%'.$this->buscar.'%')->get() : Almacen::all();
        
        return view('layouts.almacenes.listar-grid', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
