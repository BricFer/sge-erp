<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Servicio;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServicioController extends Controller
{
    public function create(): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.servicios.crear');
    }

    public function store(ServicioRequest $request): RedirectResponse
    {   
        try {
            $servicio = new Servicio;
            $servicio->fill($request->all());
            $servicio->save();

            return redirect()->route('servicio.home')->with('success', 'servicio agregado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al registrar el servicio: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Servicio $servicio): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.servicios.editar', compact('servicio'));
    }
    
    public function update(ServicioRequest $request, Servicio $servicio): RedirectResponse
    {
        try {
            $servicio->fill($request->all());
            $servicio->save();

            return redirect()->route('servicio.home')->with('success', 'servicio actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al actualizar el servicio: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Servicio $servicio): RedirectResponse
    {
        try {
            $servicio -> delete();

            return redirect()->route('servicio.home')->with('danger','servicio eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al eliminar el servicio: ' . $e->getMessage())->withInput();
        }
    }
    
    public function showService(Servicio $servicio): View
    {
        session(['previous_url' => url()->previous()]);
        return view('layouts.servicios.servicio', compact('servicio'));
    }
}
