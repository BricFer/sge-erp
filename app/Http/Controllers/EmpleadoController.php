<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmpleadoController extends Controller
{
    public function create():View
    {
        return view('layouts.empleados.crear');
    }

    public function store(EmpleadoRequest $request): RedirectResponse
    {   
        $empleado = new Empleado;
        $empleado-> nombre = $request->nombre;
        $empleado-> dni_nif = $request->dni_nif;
        $empleado-> telefono = $request->telefono;
        $empleado-> correo = $request->correo;
        $empleado-> cargo = $request->cargo;
        $empleado-> fecha_contratacion = $request->fecha_contratacion;
        $enmpleado-> estado = $request->estado;
        $empleado->save();

        return redirect()->route('empleado.home')->with('success', 'Empleado agregado correctamente');
    }

    public function edit(Empleado $empleado):View
    {
        return view('layouts.empleados.editar', compact('empleado'));
    }
    
    public function update(EmpleadoRequest $request, Empleado $empleado):RedirectResponse
    {
        $empleado = new Empleado;
        $empleado-> nombre = $request->nombre;
        $empleado-> dni_nif = $request->dni_nif;
        $empleado-> telefono = $request->telefono;
        $empleado-> correo = $request->correo;
        $empleado-> cargo = $request->cargo;
        $empleado-> fecha_contratacion = $request->fecha_contratacion;
        $enmpleado-> estado = $request->estado;
        $empleado->save();
      
        return redirect()->route('empleado.home')->with('success', 'Empleado modificado correctamente');

    }

    public function destroy(Empleado $empleado):RedirectResponse
    {
        $empleado -> delete();

        return redirect()->route('empleado.home')->with('danger','Empleado eliminado correctamente');
    }
    
    public function showEmployee(Empleado $empleado):View
    {
        return view('layouts.empleados.empleado', compact('empleado'));
    }
}
