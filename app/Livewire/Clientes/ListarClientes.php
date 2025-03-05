<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ListarClientes extends Component
{
    use WithPagination;

    public $buscar = ''; // Propiedad para la búsqueda

    // Listener entre Buscar y Listar
    protected $listeners = ['buscarClientes' => 'actualizarBusqueda'];

    public function actualizarBusqueda( $buscar )
    {
        $this->buscar = $buscar;
        $this->resetPage(); // Reiniciar paginación
    }

    public function render()
    {
        $clientes = Cliente::where('nombre', 'like', '%'.$this->buscar.'%')
        ->orWhere('nif', 'like', '%'.$this->buscar.'%')
        ->paginate(15);

        return view('layouts.clientes.listar', compact('clientes'))
            ->extends('dashboard')
            ->section('content');
    }

    public function listarGrid()
    {
        $clientes = Cliente::all();
        return view('layouts.clientes.listar-grid', compact('clientes'))
            ->extends('dashboard')
            ->section('content');
    }
}
