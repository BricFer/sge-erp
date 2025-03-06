<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ListarClientes extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $clientes = $this->buscar ? Cliente::where('nombre', 'LIKE', '%'.$this->buscar.'%')->get() : Cliente::all();

        return view('layouts.clientes.listar', compact('clientes'))
            ->extends('dashboard')
            ->section('content');
    }
}
