<?php

// Con este middleware manejo el acceso a los empleados y sus diferentes vistas, por lo que si no se es de RRHH o Admin no podrá acceder a los empleados, datos y acciones asociadas
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRRHHoAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Suponiendo que el usuario tiene atributos 'departamento' y 'rol'
        if ($user && ($user->empleado->departamento === 'RRHH' || $user->isAdmin)) {
            return $next($request);
        }

        return redirect()->back()->with('denied', 'Sección restringida.');
    }
}
