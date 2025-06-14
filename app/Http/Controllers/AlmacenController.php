<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Empleado;
use App\Models\Producto;

// Esta es la libería que utilizo para poder crear el pdf
use Barryvdh\DomPDF\Facade\Pdf;

use App\Http\Requests\AlmacenRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\View\View;

class AlmacenController extends Controller
{
    public function create():View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        // Filtrar empleados según el cargo (ejemplo: 'Jefe de Almacén')
        $empleados = Empleado::whereIn('cargo', ['Encargado de Almacén', 'Responsable de Inventario', 'Supervisor de Almacén'])->get();

        return view('layouts.almacenes.crear', compact('empleados'));
    }

    public function store(AlmacenRequest $request): RedirectResponse
    {   
        try {
            $almacen = new Almacen;
            $almacen->nombre = $request->nombre;
            $almacen->ubicacion = $request->ubicacion;
            $almacen->capacidad = $request->capacidad;
            $almacen->estado = $request->estado;
            $almacen->id_empleado = $request->id_empleado;
            $almacen->save();

            return redirect()->route('almacen.home')->with('success', 'Almacen creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al crear el almacén: ' . $e->getMessage())->withInput();
        }
        
    }

    public function edit(Almacen $almacen):View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        // Filtrar empleados según el cargo (ejemplo: 'Jefe de Almacén')
        $empleados = Empleado::whereIn('cargo', ['Encargado de Almacén', 'Responsable de Inventario', 'Supervisor de Almacén'])->get();

        return view('layouts.almacenes.editar', compact(['almacen', 'empleados']));
    }
    
    public function update(AlmacenRequest $request, Almacen $almacen):RedirectResponse
    {
        try {
            $almacen->nombre = $request->nombre;
            $almacen->ubicacion = $request->ubicacion;
            $almacen->capacidad = $request->capacidad;
            $almacen->estado = $request->estado;
            $almacen->id_empleado = $request->id_empleado;
            $almacen->save();
          
            return redirect()->route('almacen.home')->with('success', 'Almacen modificado correctamente');

        } catch(\Exception $e) {

            return redirect()->back()->with('error-db', 'Error al modificar el almacén: ' . $e->getMessage())->withInput();
        }
    }

    public function actualizarStock(Request $request, Almacen $almacen, Producto $producto): RedirectResponse
    {
        $stock = (int) $request->input('stock');

        // Se valida que el producto realmente pertenece al almacén antes de actualizar
        if (!$almacen->productos->contains($producto->id)) {
            return redirect()->back()->with('error-db', 'Producto no encontrado en este almacén');
        }

        // Actualiza directamente el stock en la tabla pivote
        $almacen->productos()->updateExistingPivot($producto->id, [
            'stock' => $stock,
        ]);

        return redirect()->back()->with('success', 'Stock actualizado correctamente');
    }

    public function destroy(Almacen $almacen): RedirectResponse
    {
        try {
            $almacen->delete();

            return redirect()->route('almacen.home')->with('success','Almacen eliminado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al eliminar el almacén: ' . $e->getMessage());
        }
    }

    // Me lista la información dentro de un almacen, es decir, información general y productos
    public function listarAlmacen(Almacen $almacen): View
    {
        session(['previous_url' => url()->previous()]);

        $almacen->load('productos');

        return view('layouts.almacenes.almacen', compact('almacen'));
    }

    public function listarInventario(Almacen $almacen): View
    {
        session(['previous_url' => url()->previous()]);
        
        $almacen->load('productos');
        $downloadUrl = route('almacen.pdf', ['almacen' => $almacen->id]);

        return view('layouts.almacenes.ajuste-almacen', compact('almacen', 'downloadUrl'));
    }

    public function generarPDF(Almacen $almacen): Response
    {
        // Carga la relación de los productos
        $almacen->load('productos');

        $pdf = Pdf::loadView('layouts.almacenes.pdf', compact('almacen'));

        return $pdf->stream("inventario-almacen-{$almacen->id}.pdf");
    }
}
