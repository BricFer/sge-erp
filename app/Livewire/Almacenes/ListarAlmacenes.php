<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;

class ListarAlmacenes extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        /* // Me permite imprimir informacion en los logs
        \Log::info('Valor de búsqueda:', ['buscar' => $this->buscar]);
        */
        $almacenes = Almacen::with('empleado') // Cargar relación de empleado
                    ->when($this->buscar, function ($query) {
                        // when($this->buscar, function ($query) { ... }) → Filtra solo si hay una búsqueda.
                        $query->where('nombre', 'LIKE', '%'.$this->buscar.'%')
                            ->orWhere('ubicacion', 'LIKE', '%'.$this->buscar.'%');
                    })
                    ->get();

        // $almacenes = $this->buscar ? Almacen::where('nombre', 'LIKE', '%'.$this->buscar.'%')->orWhere('ubicacion', 'LIKE','%'.$this->buscar.'%')->get() : Almacen::all();

        return view('layouts.almacenes.listar', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
