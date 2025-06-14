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
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        $lastEmployee = Empleado::latest()->first();
        $nextId = $lastEmployee ? $lastEmployee->id + 1 : 1;

        return view('layouts.empleados.crear', compact(['nextId']));
    }

    public function store(EmpleadoRequest $request): RedirectResponse
    {   
        try {
            $empleado = new Empleado;
            $empleado->fill($request->all());
            $empleado->save();
    
            return redirect()->route('empleado.home')->with('success', 'Empleado agregado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de alta el empleado: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Empleado $empleado):View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.empleados.editar', compact('empleado'));
    }
    
    public function update(EmpleadoRequest $request, Empleado $empleado):RedirectResponse
    {
        try {
            $empleado->fill($request->all());
            $empleado->save();
          
            return redirect()->route('empleado.home')->with('success', 'Empleado modificado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al actualizar los datos empleado: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Empleado $empleado):RedirectResponse
    {
        try {
            $empleado -> delete();

            return redirect()->route('empleado.home')->with('success','Empleado eliminado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de baja al empleado: ' . $e->getMessage());
        }
    }
    
    public function showEmployee(Empleado $empleado):View
    {
        session(['previous_url' => url()->previous()]);
        return view('layouts.empleados.empleado', compact(['empleado']));
    }
}