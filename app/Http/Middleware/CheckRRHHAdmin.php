<?php

// Con este middleware manejo el acceso a los empleados y sus diferentes vistas, por lo que si no se es de RRHH o Admin no podrá acceder a los empleados, datos y acciones asociadas
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRRHHAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se obtiene el usuario autenticado
        $user = Auth::user();

        // Se evalua si el usuario existe y si pertenece al depto. RRHH o es Admin
        if ($user && ($user->empleado->departamento === 'RRHH' || $user->isAdmin)) {
            return $next($request);
        }

        // Si no se cumple la condición anterior, el usuario recibe un mensaje informando que no tiene acceso
        return redirect()->back()->with('denied', 'Sección restringida.');
    }
}
