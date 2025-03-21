<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Servicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServicioController extends Controller
{
    public function create():View
    {
        return view('layouts.servicios.crear');
    }

    public function store(ServicioRequest $request): RedirectResponse
    {   
        $servicio = new Servicio;
        $servicio-> id_empleado = $request->id_empleado;
        $servicio-> nombre = $request->nombre;
        $servicio-> descripcion = $request->descripcion;
        $servicio-> precio = $request->precio;
        $servicio-> tipo_servicio = $request->tipo_servicio;
        $servicio->save();

        return redirect()->route('servicio.home')->with('success', 'servicio agregado correctamente');
    }

    public function edit(Servicio $servicio):View
    {
        return view('layouts.servicios.editar', compact('servicio'));
    }
    
    public function update(ServicioRequest $request, Servicio $servicio):RedirectResponse
    {
        $servicio-> id_empleado = $request->id_empleado;
        $servicio-> nombre = $request->nombre;
        $servicio-> descripcion = $request->descripcion;
        $servicio-> precio = $request->precio;
        $servicio-> tipo_servicio = $request->tipo_servicio;
        $servicio->save();
      
        return redirect()->route('servicio.home')->with('success', 'servicio modificado correctamente');
    }

    public function destroy(Servicio $servicio):RedirectResponse
    {
        $servicio -> delete();

        return redirect()->route('servicio.home')->with('danger','servicio eliminado correctamente');
    }
    
    public function showService(Servicio $servicio):View
    {
        return view('layouts.servicios.servicio', compact('servicio'));
    }
}
