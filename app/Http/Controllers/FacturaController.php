<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacturaRequest;
use App\Models\Factura;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FacturaController extends Controller
{
    public function create():View
    {
        $clientes = Cliente::all();
        $lastFactura = Factura::latest()->first(); 
        $nextId = $lastFactura ? $lastFactura->id + 1 : 1;

        return view('layouts.facturas.crear', compact(['clientes', 'nextId']));
    }

    public function store(FacturaRequest $request): RedirectResponse
    {   
        $factura = new Factura;
        $factura-> serie = $request->serie;
        $factura-> id_empleado = $request->id_empleado;
        $factura-> fecha_emision = $request->fecha_emision;
        $factura-> monto_total = $request->monto_total;
        $factura-> estado = $request->estado;
        $factura->save();

        return redirect()->route('factura.home')->with('success', 'Factura emitida correctamente');
    }

    public function edit(Factura $factura):View
    {
        return view('layouts.facturas.editar', compact('factura'));
    }
    
    public function update(FacturaRequest $request, Factura $factura):RedirectResponse
    {
        $factura-> serie = $request->serie;
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
