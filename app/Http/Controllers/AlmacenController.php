<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenRequest;
use App\Models\Almacen;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlmacenController extends Controller
{
    public function create():View
    {
        return view('layouts.almacenes.crear');
    }

    public function store(AlmacenRequest $request): RedirectResponse
    {   
        $cliente = new Almacen;
        $cliente-> nombre = $request->nombre;
        $cliente-> ubicacion = $request->ubicacion;
        $cliente->save();

        return redirect()->route('almacen.home')->with('success', 'Almacen creado correctamente');
    }

    public function edit(Almacen $almacen):View
    {
        return view('layouts.almacenes.editar', compact('almacen'));
    }
    
    public function update(AlmacenRequest $request, Almacen $almacen):RedirectResponse
    {
        $almacen-> nombre = $request->nombre;
        $almacen-> ubicacion = $request->ubicacion;
        $almacen->save();
      
        return redirect()->route('almacen.home')->with('success', 'Almacen modificado correctamente');
    }

    public function destroy(Almacen $almacen):RedirectResponse
    {
        $almacen -> delete();

        return redirect()->route('almacen.home')->with('danger','Almacen eliminado correctamente');
    }

    public function showStorage(Almacen $almacen):View
    {
        return view('layouts.almacenes.almacen', compact('almacen'));
    }
}
