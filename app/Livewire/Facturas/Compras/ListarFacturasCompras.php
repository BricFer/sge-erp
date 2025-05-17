<?php

namespace App\Livewire\Facturas\Compras;

use App\Models\Factura;
use Livewire\Component;

class ListarFacturasCompras extends Component
{
    public $buscar = ''; // Propiedad para la búsqueda

    public function render()
    {
        $type = 'Proveedor';

        /*
        Consideraciones
            Este método funciona bien si no se tienen miles de facturas, ya que todo se filtra en PHP después de cargar los datos.
            Laravel no puede hacer joins sobre relaciones polimórficas, por lo tanto no se puede hacer directamente un whereHas('facturable', ...) sin usar una solución más compleja o cambiar el diseño.
        */
        
        // Traer todas las facturas con su relación
        $facturas = Factura::with('facturable')
            ->where('facturable_type', 'LIKE', '%'.$type.'%')
            ->get();

        // Filtrar en memoria por el campo relacionado
        if ($this->buscar) {
            $buscar = strtolower($this->buscar);

            $facturas = $facturas->filter(function ($factura) use ($buscar) {
                $cliente = $factura->facturable;

                return str_contains(strtolower($factura->serie), $buscar)
                    || str_contains(strtolower($factura->fecha_emision), $buscar)
                    || ($cliente && str_contains(strtolower($cliente->nombre_completo), $buscar));
            });
        }

        return view('layouts.facturas.compras.listar', compact(['facturas']))
            ->extends('dashboard')
            ->section('content');
    }
}
