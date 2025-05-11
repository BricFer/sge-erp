<?php

namespace App\Http\Middleware;

// Con este middleware manejo el acceso a las facturas, productos y clientes, y sus diferentes vistas, por lo que si no se es de Ventas o Admin no podrá acceder a la información

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSalesAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Recupero el usuario que ha iniciado sesión
        $user = Auth::user();

        // Evaluo si pertenece a ventas o si es Admin
        if ($user && ($user->empleado->departamento === 'Ventas' || $user->isAdmin)) {
            return $next($request);
        }

        // Si no se cumple la condición anterior permanece en la misma vista y muestra un mensaje.
        return redirect()->back()->with('denied', 'Sección restringida.');
    }
}
