<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\AlmacenProducto;
use App\Models\Cliente;
use App\Models\DetalleFacturaProducto;
use App\Models\Empleado;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Http\Requests\FacturaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DB;

class FacturaController extends Controller
{
    public function createSales():View
    {
        $clientes = Cliente::all()->sortBy('nombre_completo');
        $empleados = Empleado::all()->sortBy('nombre');
        // Esta línea obtiene todos los almacenes (Almacen::get()) y, al mismo tiempo, precarga los productos relacionados con cada almacén, incluyendo el campo stock de la tabla intermedia de la relación muchos a muchos.
        $almacenes = Almacen::with(['productos' => function ($query) {
            $query->withPivot('stock');
        }])->get();  

        $lastFactura = Factura::latest()->first(); 
        $nextId = $lastFactura ? $lastFactura->id + 1 : 1;

        $managers = (array) Empleado::whereIn('cargo', ['Supervisora de Ventas', 'Encargado de Zona', 'Ejecutiva de Cuentas'])->pluck('cargo')->toArray();

        return view('layouts.facturas.ventas.ventas', compact(['clientes', 'empleados', 'managers', 'nextId', 'almacenes']));
    }

    public function createPurchases():View
    {
        $proveedores = Proveedor::all()->sortBy('nombre_completo');
        $empleados = Empleado::all()->sortBy('nombre');
        $almacenes = Almacen::with(['productos' => function ($query) {
            $query->withPivot('stock');
        }])->get();  

        $lastFactura = Factura::latest()->first(); 
        $nextId = $lastFactura ? $lastFactura->id + 1 : 1;

        $managers = (array) Empleado::whereIn('cargo', ['Supervisora de Ventas', 'Encargado de Zona', 'Ejecutiva de Cuentas'])->pluck('cargo')->toArray();

        return view('layouts.facturas.compras.compras', compact(['proveedores', 'managers', 'empleados', 'nextId', 'almacenes']));
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
                'id_almacen' => $request->id_almacen,
            ]);

            foreach ($request->id_producto as $index => $id_producto) {
                DetalleFacturaProducto::create([
                    'num_linea' => $request->num_linea[$index],
                    'id_producto' => $id_producto,
                    'id_factura' => $factura->id,
                    'precio' => $request->precio[$index],
                    'iva' => $request->iva[$index],
                    'cantidad' => $request->cantidad[$index],
                    'subtotal' => $request->subtotal[$index],
                    'descuento' => $request->descuento[$index],
                ]);
            }

            foreach($request->id_producto as $index=>$id_producto) {
                $almacenProducto = AlmacenProducto::where('id_almacen', $request->id_almacen)->where('id_producto', $id_producto)->lockForUpdate()->first();

                /*
                    Cuando varias personas están facturando al mismo tiempo, imagina este problema:
                        Usuario A y usuario B cargan stock del mismo almacén.
                        Ambos leen que quedan 5 unidades.
                        Ambos intentan vender 3 unidades.
                    Mientras este proceso no termine, nadie puede tocar el id=1 en almacen_producto.
                    Evita errores de concurrencia y mantiene consistencia.
                */
                
                if( $almacenProducto) {

                    $cantidadFactura = $request->cantidad[$index];

                    if( str_contains( $request->facturable_type, 'Cliente') ) {
        
                        // Reducir el stock del almacen que se ha seleccionado
                        $almacenProducto->stock -= $cantidadFactura;
                        
                    } else if( str_contains( $request->facturable_type, 'Proveedor') ) {
        
                        // Incrementar el stock del almacen que se ha seleccionado
                        $almacenProducto->stock += $cantidadFactura;
                    }

                    $almacenProducto->save();

                } else {
                    throw new \Exception("El producto ID {$id_producto} no existe en el almacén seleccionado.");
                }
            }
            
        });

        if (str_contains($request->facturable_type, 'Cliente')) {

            return redirect()->route('factura.ventas')->with('success', 'Factura emitida correctamente');
        }

        return redirect()->route('factura.compras')->with('success', 'Factura registrada correctamente');
    }

    /*
    // Las funciones edit() y update() no son necesarias para las facturas ya que solo se pueden crear, leear y eliminar, pero se dejan dentro del controlador para futuras referencias
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
                    'num_linea' => $num_linea[$index],
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
    */

    public function destroy(Factura $factura):RedirectResponse
    {
        DB::transaction(function () use ($factura) {

            // 1. Recuperar los detalles de la factura
            $detalles = DetalleFacturaProducto::where('id_factura', $factura->id)->get();
    
            foreach ($detalles as $detalle) {
                $almacenProducto = AlmacenProducto::where('id_almacen', $factura->id_almacen)
                                    ->where('id_producto', $detalle->id_producto)
                                    ->lockForUpdate()
                                    ->first();
    
                if ($almacenProducto) {

                    if( str_contains( $factura->facturable_type, 'Cliente') ) {
        
                        // 2. Devolver la cantidad al stock si se elimina la factura de ventas
                        $almacenProducto->stock += $detalle->cantidad;
                        
                    } else if( str_contains( $factura->facturable_type, 'Proveedor') ) {
        
                        // 2. Eliminar la cantidad al stock si se elimina la factura de compras
                        $almacenProducto->stock -= $detalle->cantidad;
                    }
                    
                    $almacenProducto->save();
                }
            }
    
            // 3. Eliminar los detalles de la factura
            DetalleFacturaProducto::where('id_factura', $factura->id)->delete();
    
            // 4. Eliminar la factura
            $factura->delete();
        });

        return redirect()->back()->with('danger','Factura eliminada correctamente');
    }
    
    public function show(Factura $factura):View
    {
        if( str_contains( $factura->facturable_type, 'Cliente') ) {

            return view('layouts.facturas.ventas.factura', compact('factura'));
        } else {
            
            return view('layouts.facturas.compras.factura', compact('factura'));
        }
    }

    // TODO: Generar PDF factura
    public function generarPDF(Factura $factura) {
        $factura->load('');

        $pdf = Pdf::loadView('layouts.facturas.pdf', compact('factura'));

        return $pdf->stream("factura-{$factura->id}.pdf");
    }
}
