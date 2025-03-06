<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;

class ListarAlmacenes extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $almacenes = $this->buscar ? Almacen::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Almacen::all();

        return view('layouts.almacenes.listar', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
