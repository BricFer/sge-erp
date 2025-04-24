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
        $productos = Producto::with(['almacenes'])->sortBy('nombre')->get();

        $lastFactura = Factura::latest()->first(); 
        $nextId = $lastFactura ? $lastFactura->id + 1 : 1;

        return view('layouts.facturas.crear-producto', compact(['clientes', 'empleados', 'nextId', 'productos']));
    }

    public function store(FacturaRequest $request): RedirectResponse
    {   
        DB::transaction(function () use ($request) {

            // Crear la factura
            $factura = Factura::create([
                'facturable_id' => $request->facturable_id,
                'facturable_type' => $request->facturable_type,
                'serie' => $request->serie,
                'id_empleado' => $request->id_empleado,
                'porcentaje_descuento' => $request->porcentaje_descuento,
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
                    'subtotal' => $request->subtotal[$index],
                    'descuento' => $request->descuento[$index],
                ]);
            }
            
        });

        return redirect()->route('factura.home')->with('success', 'Factura emitida correctamente');
    }

    public function edit(Factura $factura):View
    {
        $clientes = Cliente::all()->sortBy('nombre_completo');
        $empleados = Empleado::all()->sortBy('nombre');
        $productos = Producto::with(['almacenes'])->get()->sortBy('nombre');

        return view('layouts.facturas.editar-producto', compact(['factura', 'clientes', 'empleados', 'productos']));
    }
    
    public function update(FacturaRequest $request, Factura $factura):RedirectResponse
    {
        DB::transaction(function () use ($request, $factura) {
            // Actualizar la factura
            $factura->update([
                'facturable_id' => $request->facturable_id,
                'facturable_type' => $request->facturable_type,
                'serie' => $request->serie,
                'id_empleado' => $request->id_empleado,
                'porcentaje_descuento' => $request->porcentaje_descuento,
                'fecha_emision' => $request->fecha_emision,
                'monto_subtotal' => $request->monto_subtotal,
                'monto_descuento' => $request->monto_descuento,
                'monto_iva' => $request->monto_iva,
                'monto_total' => $request->monto_total,
                'estado' => $request->estado,
            ]);
    
            // Eliminar los detalles anteriores, para "agregar" los nuevos
            DetalleFacturaProducto::where('id_factura', $factura->id)->delete();
    
            // Crear los "nuevos" detalles
            foreach ($request->id_producto as $index => $id_producto) {
                DetalleFacturaProducto::create([
                    'id_factura' => $factura->id,
                    'id_producto' => $id_producto,
                    'precio' => $request->precio[$index],
                    'iva' => $request->iva[$index],
                    'cantidad' => $request->cantidad[$index],
                    'subtotal' => $request->subtotal[$index],
                    'descuento' => $request->descuento[$index],
                ]);
            }
        });
      
        return redirect()->route('factura.home')->with('success', 'Factura modificada correctamente');
    }

    public function destroy(Factura $factura):RedirectResponse
    {
        $factura -> delete();

        return redirect()->route('factura.home')->with('danger','Factura eliminada correctamente');
    }
    
    public function showInvoice(Factura $factura):View
    {
        return view('layouts.facturas.factura', compact('factura'));
    }
}
