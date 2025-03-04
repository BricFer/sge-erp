<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class Buscar extends Component {

    public $buscar = '';

    public function updatedBuscar()
    {
        // Emitir el evento 'buscar' con el término de búsqueda
        $this->emit('buscarClientes', $this->buscar);
    }

    public function render()
    {
        return view('layouts.clientes.buscar');
    }
}