<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenRequest;
use App\Models\Almacen;
use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlmacenController extends Controller
{
    public function create():View
    {
        // Filtrar empleados según el cargo (ejemplo: 'Jefe de Almacén')
        $empleados = Empleado::whereIn('cargo', ['Command Control Center Specialist', 'MARCOM Manager'])->get();

        return view('layouts.almacenes.crear', compact('empleados'));
    }

    public function store(AlmacenRequest $request): RedirectResponse
    {   
        $almacen = new Almacen;
        $almacen-> nombre = $request->nombre;
        $almacen-> ubicacion = $request->ubicacion;
        $almacen-> capacidad = $request->capacidad;
        $almacen-> estado = $request->estado;
        $almacen-> id_empleado = $request->id_empleado;
        $almacen->save();

        return redirect()->route('almacen.home')->with('success', 'Almacen creado correctamente');
    }

    public function edit(Almacen $almacen):View
    {
        // Filtrar empleados según el cargo (ejemplo: 'Jefe de Almacén')
        $empleados = Empleado::whereIn('cargo', ['Command Control Center Specialist', 'MARCOM Manager'])->get();

        return view('layouts.almacenes.editar', compact(['almacen', 'empleados']));
    }
    
    public function update(AlmacenRequest $request, Almacen $almacen):RedirectResponse
    {
        $almacen-> nombre = $request->nombre;
        $almacen-> ubicacion = $request->ubicacion;
        $almacen-> capacidad = $request->capacidad;
        $almacen-> estado = $request->estado;
        $almacen-> id_empleado = $request->id_empleado;
        $almacen->save();
      
        return redirect()->route('almacen.home')->with('success', 'Almacen modificado correctamente');
    }

    public function destroy(Almacen $almacen):RedirectResponse
    {
        $almacen -> delete();

        return redirect()->route('almacen.home')->with('danger','Almacen eliminado correctamente');
    }

    public function listarAlmacen(Almacen $almacen):View
    {
        $almacen->load('productos');

        return view('layouts.almacenes.almacen', compact('almacen'));
    }
}
