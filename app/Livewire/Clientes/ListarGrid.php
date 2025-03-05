<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ListarGrid extends Component
{
    use WithPagination;

    public function render()
    {
        $clientes = Cliente::all();
        return view('layouts.clientes.listar-grid', compact('clientes'))
            ->extends('dashboard')
            ->section('content');
    }
}
