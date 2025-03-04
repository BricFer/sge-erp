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
        return view('layouts.proveedores.crear');
    }

    public function store(ProveedorRequest $request): RedirectResponse
    {   
        $proveedor = new Proveedor;
        $proveedor-> nombre = $request->nombre;
        $proveedor-> cif = $request->cif;
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
}
