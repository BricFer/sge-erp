<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Listar extends Component
{
    public function render()
    {
        $clientes = Cliente::all();

        return view('layouts.clientes.listar', compact('clientes'))
        ->extends('home')
        ->section('content');
       }
}
