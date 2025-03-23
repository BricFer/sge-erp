<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function create():View
    {
        return view('layouts.clientes.crear');
    }

    public function store(ClienteRequest $request): RedirectResponse
    {   
        $cliente = new Cliente;
        $cliente-> nombre = $request->nombre;
        $cliente-> apellido = $request->apellido;
        $cliente-> nif = $request->nif;
        $cliente-> domicilio = $request->domicilio;
        $cliente-> cod_postal = $request->cod_postal;
        $cliente-> poblacion = $request->poblacion;
        $cliente-> provincia = $request->provincia;
        $cliente-> telefono = $request->telefono;
        $cliente-> correo = $request->correo;
        $cliente->save();

        return redirect()->route('cliente.home')->with('success', 'Cliente creado correctamente');
    }

    public function edit(Cliente $cliente):View
    {
        return view('layouts.clientes.editar', compact('cliente'));
    }
    
    public function update(ClienteRequest $request, Cliente $cliente):RedirectResponse
    {
        $cliente-> nombre = $request->nombre;
        $cliente-> apellido = $request->apellido;
        $cliente-> nif = $request->nif;
        $cliente-> domicilio = $request->domicilio;
        $cliente-> cod_postal = $request->cod_postal;
        $cliente-> poblacion = $request->poblacion;
        $cliente-> provincia = $request->provincia;
        $cliente-> telefono = $request->telefono;
        $cliente-> correo = $request->correo;
        $cliente->save();
      
        return redirect()->route('cliente.home')->with('success', 'Cliente modificado correctamente');
    }

    public function destroy(Cliente $cliente):RedirectResponse
    {
        $cliente -> delete();

        return redirect()->route('cliente.home')->with('danger','Cliente eliminado correctamente');
    }

    public function showClient(Cliente $cliente):View
    {
        return view('layouts.clientes.cliente', compact('cliente'));
    }

    public function listarFacturas(Cliente $cliente): View
    {
        $factura->load('facturas');

        return view('layouts.facturas.factura', compact('factura'));
    }
}
