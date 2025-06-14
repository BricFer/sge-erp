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
        $lastClient = Cliente::latest()->first(); 
        $nextId = $lastClient ? $lastClient->id + 1 : 1;

        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.clientes.crear', compact(['nextId']));
    }

    public function store(ClienteRequest $request): RedirectResponse
    {   
        try {
            $cliente = new Cliente;
            $cliente->cod_cliente = $request->cod_cliente;
            $cliente->nombre_completo = $request->nombre_completo;
            $cliente->nif = $request->nif;
            $cliente->razon_social = $request->razon_social;
            $cliente->domicilio = $request->domicilio;
            $cliente->cod_postal = $request->cod_postal;
            $cliente->poblacion = $request->poblacion;
            $cliente->provincia = $request->provincia;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
            $cliente->save();
    
            return redirect()->route('cliente.home')->with('success', 'Cliente creado correctamente');
        } catch(\Exception $e) {

            return redirect()->back()->with('error-db', 'Error al dar de alta al cliente: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Cliente $cliente): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);

        return view('layouts.clientes.editar', compact('cliente'));
    }
    
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        try {
            // Se puede usar fill() si se tienen los campos protegidos con $fillable en el modelo, también podría usarse en la función 'store'
            $cliente->fill($request->all());
            $cliente->save();
          
            return redirect()->route('cliente.home')->with('success', 'Cliente modificado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al modificar el cliente: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Cliente $cliente): RedirectResponse
    {
        try {
            $cliente->delete();
    
            return redirect()->route('cliente.home')->with('success','Cliente eliminado correctamente');
        } catch(\Exception $e) {
            return redirect()->back()->with('error-db', 'Error al dar de baja el cliente: ' . $e->getMessage());
        }
    }

    public function showCliente(Cliente $cliente): View
    {
        // Guardar la URL anterior en la sesión para que no se pierda si el usuario recarga la página
        session(['previous_url' => url()->previous()]);
        
        return view('layouts.clientes.cliente', compact('cliente'));
    }
}
