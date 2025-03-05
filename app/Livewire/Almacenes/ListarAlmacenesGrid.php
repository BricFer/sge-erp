<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;
use Livewire\WithPagination;

class ListarAlmacenesGrid extends Component
{
    use WithPagination;

    public function render()
    {
        $almacenes = Almacen::all();
        
        return view('layouts.almacenes.listar-grid', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
