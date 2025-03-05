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
        return view('layouts.productos.crear');
    }

    public function store(ProductoRequest $request): RedirectResponse
    {   
        $producto = new Producto;
        $producto-> nombre = $request->nombre;
        $producto-> precio_compra = $request->precio_compra;
        $producto-> precio_venta = $request->precio_venta;
        $producto-> iva = $request->iva;
        $producto-> descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('producto.home')->with('success', 'Producto agregado correctamente');
    }

    public function edit(Producto $producto):View
    {
        return view('layouts.productos.editar', compact('producto'));
    }
    
    public function update(ProductoRequest $request, Producto $producto):RedirectResponse
    {
        $producto-> nombre = $request->nombre;
        $producto-> precio_compra = $request->precio_compra;
        $producto-> precio_venta = $request->precio_venta;
        $producto-> iva = $request->iva;
        $producto-> descripcion = $request->descripcion;
        $producto->save();
      
        return redirect()->route('producto.home')->with('success', 'Producto modificado correctamente');
    }

    public function destroy(Producto $producto):RedirectResponse
    {
        $producto -> delete();

        return redirect()->route('producto.home')->with('danger','Producto eliminado correctamente');
    }
    
    public function showProduct(Producto $producto):View
    {
        return view('layouts.productos.producto', compact('producto'));
    }
}
