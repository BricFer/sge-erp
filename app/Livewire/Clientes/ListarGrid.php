<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class ListarGrid extends Component
{
    public $buscar = '';

    public function render()
    {
        $clientes = $this->buscar ? Cliente::where('nombre_completo', 'LIKE', '%'.$this->buscar.'%')->get() : Cliente::all();

        return view('layouts.clientes.listar-grid', compact('clientes'))
            ->extends('dashboard')
            ->section('content');
    }
}
