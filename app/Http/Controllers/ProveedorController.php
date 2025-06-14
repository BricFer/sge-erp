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
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        $lastSupplier = Proveedor::latest()->first();
        $nextId = $lastSupplier ? $lastSupplier->id + 1 : 1;

        return view('layouts.proveedores.crear', compact(['nextId']));
    }

    public function store(ProveedorRequest $request): RedirectResponse
    {   
        try {
            // Se puede usar fill() si se tienen los campos protegidos con $fillable en el modelo
            $proveedor = new Proveedor;
            $proveedor->fill($request->all());
            $proveedor->save();
    
            return redirect()->route('proveedor.home')->with('success', 'Proveedor agregado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de alta al proveedor: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Proveedor $proveedor): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.proveedores.editar', compact('proveedor'));
    }
    
    public function update(ProveedorRequest $request, Proveedor $proveedor): RedirectResponse
    {
        try {
            $proveedor->fill($request->all());
            $proveedor->save();
        
            return redirect()->route('proveedor.home')->with('success', 'Proveedor modificado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al actualizar al proveedor: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Proveedor $proveedor): RedirectResponse
    {
        try {
            $proveedor->delete();
            return redirect()->route('proveedor.home')->with('success','Proveedor eliminado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de baja al proveedor: ' . $e->getMessage());
        }
    }

    public function showSupplier(Proveedor $proveedor): View
    {
        session(['previous_url' => url()->previous()]);
        return view('layouts.proveedores.proveedor', compact('proveedor'));
    }
}
