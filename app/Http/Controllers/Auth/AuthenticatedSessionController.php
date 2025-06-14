<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Recuperamos el usuario autenticado
        $user = Auth::user();

        // Suponiendo que el usuario tiene relación con empleado()
        if (!in_array($user->empleado->estado ?? null, ['activo', 'excedencia'])) {
            Auth::logout(); // Cerramos sesión si no cumple la condición

            return back()->withErrors([
                'correo' => 'Tu cuenta de empleado no está activa para iniciar sesión.',
            ]);
        }

        $request->session()->regenerate();

        // Accede al departamento del empleado
        $departamento = strtolower(optional($user->empleado)->departamento);

        // Redirige según el departamento
        switch($departamento) {
            case 'rrhh':
                return redirect()->intended(route('empleado.home'));
            case 'marketing':
                return redirect()->intended(route('producto.home'));
            case 'ventas':
                return redirect()->intended(route('factura.ventas'));
            case 'compras':
                return redirect()->intended(route('factura.compras'));
            case 'almacén':
                return redirect()->intended(route('almacen.home'));
            case 'it':
            default:
                return redirect()->intended(route('home')); // TODO: Cambiar para que tenga accesos pero solo de lectura
        }

        // return redirect()->intended(route('home', absolute: false));

        // Validación en caso de usar otro modelo que no sea el de autenticación que viene por defecto con Laravel
        // $request->validate([
        //     'correo' => 'required|email',
        //     'password' => 'required',
        // ]);
    
        // if (Auth::guard('empleado')->attempt([
        //     'correo' => $request->correo,
        //     'password' => $request->password,
        // ], $request->boolean('remember'))) {
        //     $request->session()->regenerate();
    
        //     return redirect()->intended(route('home'));
        // }
    
        // return back()->withErrors([
        //     'correo' => 'Las credenciales no coinciden',
        // ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
