<?php

namespace App\Livewire\Almacenes;

use App\Models\Almacen;
use Livewire\Component;

class ListarAlmacenesGrid extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        /* // Me permite imprimir informacion en los logs
        \Log::info('Valor de búsqueda:', ['buscar' => $this->buscar]);
        */

        $almacenes = $this->buscar ? Almacen::with('empleado')->where('nombre', 'LIKE', '%'.$this->buscar.'%')->orWhere('ubicacion', 'LIKE','%'.$this->buscar.'%')->get() : Almacen::all();
        
        return view('layouts.almacenes.listar-grid', compact('almacenes'))
            ->extends('dashboard')
            ->section('content');
    }
}
