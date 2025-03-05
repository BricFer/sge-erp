<?php

namespace App\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ListarProductosGrid extends Component
{
    use WithPagination;

    public function render()
    {
        $productos = Producto::paginate(15);
        return view('layouts.productos.listar-grid', compact('productos'))
            ->extends('dashboard')
            ->section('content');
    }
}
