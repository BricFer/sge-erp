<?php

namespace App\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;

class ListarProductosGrid extends Component
{
    public $buscar = '';


    public function render()
    {
        $productos = $this->buscar ? Producto::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Producto::all();

        return view('layouts.productos.listar-grid', compact('productos'))
            ->extends('dashboard')
            ->section('content');
    }
}
