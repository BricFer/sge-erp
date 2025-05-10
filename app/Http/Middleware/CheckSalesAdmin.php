<?php

namespace App\Http\Middleware;

// Con este middleware manejo el acceso a las facturas, productos y clientes, y sus diferentes vistas, por lo que si no se es de RRHH o Admin no podrá acceder a la información

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
        $user = Auth::user();
        if ($user && ($user->empleado->departamento === 'Ventas' || $user->isAdmin)) {
            return $next($request);
        }

        return redirect()->back()->with('denied', 'Sección restringida.');
    }
}
