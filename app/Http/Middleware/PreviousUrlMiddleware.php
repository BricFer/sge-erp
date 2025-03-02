<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreviousUrlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $previousUrl = url()->previous();
        $currentUrl = url()->current();

        // Evitar que la URL anterior sea la misma que la actual
        if ($previousUrl === $currentUrl || !str_contains($previousUrl, url('/'))) {
            $previousUrl = route('home'); // Cambia esto a la ruta que prefieras
        }

        // Compartir la variable con todas las vistas
        view()->share('previousUrl', $previousUrl);

        return $next($request);
    }
}
