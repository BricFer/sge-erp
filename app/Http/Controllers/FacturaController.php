<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacturaRequest;
use App\Models\Cliente;
use App\Models\DetalleFacturaProducto;
use App\Models\Empleado;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DB;

class FacturaController extends Controller
{
    public function create():View
    {
        $clientes = Cliente::all()->sortBy('nombre_completo');
        $empleados = Empleado::all()->sortBy('nombre');
        // Se almacena en $productos los almacenes, para poder acceder a valores como 'stock'
        $productos = Producto::with(['almacenes'])->get()->sortBy('nombre');

        $lastFactura = Factura::latest()->first(); 
        $nextId = $lastFactura ? $lastFactura->id + 1 : 1;

        return view('layouts.facturas.crear-producto', compact(['clientes', 'empleados', 'nextId', 'productos']));
    }

    public function store(FacturaRequest $request): RedirectResponse
    {   
        DB::transaction(function () use ($request) {

            // Crear la factura
            $factura = Factura::create([
                'facturable_type' => $request->facturable_type,
                'facturable_id' => $request->facturable_id,
                'serie' => $request->serie,
                'id_empleado' => $request->id_empleado,
                'fecha_emision' => $request->fecha_emision,
                'monto_subtotal' => $request->monto_subtotal,
                'monto_descuento' => $request->monto_descuento,
                'monto_iva' => $request->monto_iva,
                'monto_total' => $request->monto_total,
            ]);

            // Insertar detalles de factura
 /*           foreach ($request->detalles as $detalle) {
                
                DetalleFacturaServicio::create([
                    'id_factura' => $factura->id,
                    'id_servicio' => $detalle['id_producto'],
                    'fecha_inicio' => $detalle['fecha_inicio'],
                    'fecha_fin' => $detalle['fecha_fin'] ?? null,
                    'estado' => $detalle['estado'],
                    'prioridad' => $detalle['prioridad'],
                    'descuento' => $detalle['descuento'],
                    'subtotal' => $detalle['subtotal'],
                ]);
            } */

            foreach ($request->id_producto as $index => $id_producto) {
                DetalleFacturaProducto::create([
                    'id_producto' => $id_producto,
                    'id_factura' => $factura->id,
                    'precio' => $request->precio[$index],
                    'iva' => $request->iva[$index],
                    'cantidad' => $request->cantidad[$index],
                    'descuento' => $request->descuento[$index],
                    'subtotal' => $request->subtotal[$index],
                ]);
            }
            
        });

        return redirect()->route('factura.home')->with('success', 'Factura emitida correctamente');
    }

    public function edit(Factura $factura):View
    {
        return view('layouts.facturas.editar', compact('factura'));
    }
    
    public function update(FacturaRequest $request, Factura $factura):RedirectResponse
    {
        $factura-> serie = $request->serie;
        $factura-> facturable_id = $request->facturable_id;
        $factura-> id_empleado = $request->id_empleado;
        $factura-> fecha_emision = $request->fecha_emision;
        $factura-> monto_total = $request->monto_total;
        $factura-> estado = $request->estado;
        $factura->save();
      
        return redirect()->route('factura.home')->with('success', 'Factura modificada correctamente');
    }

    public function destroy(Factura $factura):RedirectResponse
    {
        $factura -> delete();

        return redirect()->route('factura.home')->with('danger','factura eliminado correctamente');
    }
    
    public function showInvoice(Factura $factura):View
    {
        return view('layouts.facturas.factura', compact('factura'));
    }
}
