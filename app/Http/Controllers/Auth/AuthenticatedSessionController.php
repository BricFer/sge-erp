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

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));

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
