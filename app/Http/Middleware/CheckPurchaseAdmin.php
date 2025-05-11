<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPurchaseAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Se obtiene el usuario autenticado
        $user = Auth::user();

        // Se evalua si el usuario existe y si pertenece al depto. Compras o es Admin
        if ($user && ($user->empleado->departamento === 'Compras' || $user->isAdmin)) {
            return $next($request);
        }

        // Si no se cumple la condición anterior, el usuario recibe un mensaje informando que no tiene acceso
        return redirect()->back()->with('denied', 'Sección restringida.');
    
    }
}
