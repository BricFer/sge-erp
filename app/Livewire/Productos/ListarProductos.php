<?php

namespace App\Livewire\Productos;

use App\Models\Producto;
use Livewire\Component;

class ListarProductos extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $productos = $this->buscar ? Producto::where('nombre', 'LIKE', '%'.$this->buscar.'%')->orWhere('categoria', 'LIKE', '%'.$this->buscar.'%')->get() : Producto::all();

        return view('layouts.productos.listar', compact('productos'))
            ->extends('dashboard')
            ->section('content');
    }
}
