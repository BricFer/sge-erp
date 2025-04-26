<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorRequest;
use App\Models\Proveedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProveedorController extends Controller
{
    public function create():View
    {
        $lastSupplier = Proveedor::latest()->first(); 
        $nextId = $lastSupplier ? $lastSupplier->id + 1 : 1;

        return view('layouts.proveedores.crear', compact(['nextId']));
    }

    public function store(ProveedorRequest $request): RedirectResponse
    {   
        $proveedor = new Proveedor;
        $proveedor-> cod_proveedor = $request->cod_proveedor;
        $proveedor-> nombre_completo = $request->nombre_completo;
        $proveedor-> cif = $request->cif;
        $proveedor-> razon_social = $request->razon_social;
        $proveedor-> domicilio = $request->domicilio;
        $proveedor-> cod_postal = $request->cod_postal;
        $proveedor-> poblacion = $request->poblacion;
        $proveedor-> provincia = $request->provincia;
        $proveedor-> telefono = $request->telefono;
        $proveedor-> correo = $request->correo;
        $proveedor->save();

        return redirect()->route('proveedor.home')->with('success', 'Proveedor agregado correctamente');
    }

    public function edit(Proveedor $proveedor):View
    {
        return view('layouts.proveedores.editar', compact('proveedor'));
    }
    
    public function update(ProveedorRequest $request, Proveedor $proveedor):RedirectResponse
    {
        $proveedor-> nombre = $request->nombre;
        $proveedor-> cif = $request->cif;
        $proveedor-> razon_social = $request->razon_social;
        $proveedor-> domicilio = $request->domicilio;
        $proveedor-> cod_postal = $request->cod_postal;
        $proveedor-> poblacion = $request->poblacion;
        $proveedor-> provincia = $request->provincia;
        $proveedor-> telefono = $request->telefono;
        $proveedor-> correo = $request->correo;
        $proveedor->save();
      
        return redirect()->route('proveedor.home')->with('success', 'Proveedor modificado correctamente');
    }

    public function destroy(Proveedor $proveedor):RedirectResponse
    {
        $proveedor -> delete();

        return redirect()->route('proveedor.home')->with('danger','Proveedor eliminado correctamente');
    }

    public function showSupplier(Proveedor $proveedor):View
    {
        return view('layouts.proveedores.proveedor', compact('proveedor'));
    }

    public function listarFacturas(Proveedor $proveedor): View
    {
        $factura->load('facturas');

        return view('layouts.facturas.factura', compact('factura'));
    }
}
