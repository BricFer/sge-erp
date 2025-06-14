<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function create():View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.productos.crear');
    }

    public function store(ProductoRequest $request): RedirectResponse
    {   
        try {
            // Se puede usar fill() si se tienen los campos protegidos con $fillable en el modelo
            $producto = new Producto;
            $producto->fill($request->all());
            $producto->save();
    
            return redirect()->route('producto.home')->with('success', 'Producto agregado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de alta el producto: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Producto $producto): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);
        return view('layouts.productos.editar', compact('producto'));
    }
    
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        try {
            // Se puede usar fill() si se tienen los campos protegidos con $fillable en el modelo
            $producto->fill($request->all());
            $producto->save();
    
            return redirect()->route('producto.home')->with('success', 'Producto modificado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al actualizar el producto: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        try {
            $producto -> delete();

            return redirect()->route('producto.home')->with('success','Producto eliminado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de baja el producto: ' . $e->getMessage());
        }
    }

    public function listarProducto(Producto $producto): View
    {
        session(['previous_url' => url()->previous()]);
        
        $producto->load('almacenes');
        return view('layouts.productos.producto', compact('producto'));
    }
}
