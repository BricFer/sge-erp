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
        $lastEmployee = Empleado::latest()->first(); 
        $nextId = $lastEmployee ? $lastEmployee->id + 1 : 1;

        return view('layouts.empleados.crear', compact(['nextId']));
    }

    public function store(EmpleadoRequest $request): RedirectResponse
    {   
        $empleado = new Empleado;
        $empleado->legajo = $request->legajo;
        $empleado-> nombre_completo = $request->nombre_completo;
        $empleado-> dni_nif = $request->dni_nif;
        $empleado-> telefono = $request->telefono;
        $empleado-> correo = $request->correo;
        $empleado-> cargo = $request->cargo;
        $empleado-> departamento = $request->departamento;
        $empleado-> fecha_contratacion = $request->fecha_contratacion;
        $empleado-> fecha_fin = $request->fecha_fin;
        $empleado-> estado = $request->estado;
        $empleado->user_id = $request->user_id;
        $empleado->save();

        return redirect()->route('empleado.home')->with('success', 'Empleado agregado correctamente');
    }

    public function edit(Empleado $empleado):View
    {
        return view('layouts.empleados.editar', compact('empleado'));
    }
    
    public function update(EmpleadoRequest $request, Empleado $empleado):RedirectResponse
    {
        $empleado->legajo = $request->legajo;
        $empleado-> nombre_completo = $request->nombre_completo;
        $empleado-> dni_nif = $request->dni_nif;
        $empleado-> telefono = $request->telefono;
        $empleado-> correo = $request->correo;
        $empleado-> cargo = $request->cargo;
        $empleado-> departamento = $request->departamento;
        $empleado-> fecha_contratacion = $request->fecha_contratacion;
        $empleado-> fecha_fin = $request->fecha_fin;
        $empleado-> estado = $request->estado;
        $empleado->user_id = $request->user_id;
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
        $managers = (array) Empleado::whereIn('cargo', ['Supervisora de Ventas', 'Encargado de Zona', 'Ejecutiva de Cuentas'])->pluck('cargo')->toArray();

        return view('layouts.empleados.empleado', compact(['empleado', 'managers']));
    }

    public function listarFacturas(Empleado $empleado): View
    {
        $factura->load('facturas');

        return view('layouts.facturas.factura', compact('factura'));
    }
}
