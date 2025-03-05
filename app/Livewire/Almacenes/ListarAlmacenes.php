<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;
use Livewire\WithPagination;

class ListarAlmacenes extends Component
{
    use WithPagination;

    public function render()
    {
        $almacenes = Almacen::paginate(15);

        return view('layouts.almacenes.listar', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }

    public function listarGrid()
    {
        $almacenes = Almacen::all();
        return view('layouts.almacenes.listar-grid', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
