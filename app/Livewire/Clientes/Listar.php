<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Listar extends Component
{
    use WithPagination;

    public function render()
    {
        $clientes = Cliente::paginate(15);

        return view('layouts.clientes.listar', compact('clientes'))
        ->extends('dashboard')
        ->section('content');
       }
}
