<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'user' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken('API TOKEN')->plainTextToken,
        ], 200);
    }

    public function loginUser(LoginRequest $request)
    {
        // if( !Auth::attempt($request->only(['email', 'password'])) )
        // {
        //     return response()->json([
        //         'status' =>  false,
        //         'message' => 'Invalid email or password'
        //     ], 401);
        // }

        // $user = User::where('email', $request->email)->first();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'User lodded in successfully',
        //     'token' => $user->createToken('API TOKEN').plainTextToken,
        // ], 200);

        $user = User::with('empleado')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden.',
            ]);
        }

        Auth::login($user);

        /*// Verifica el objeto empleado
        Log::info('Empleado:', ['empleado' => $user->empleado]);

        // Verifica el valor del departamento
        $departamento = optional($user->empleado)->departamento;
        Log::info('Departamento:', ['departamento' => $departamento]); */

    }

    public function logout(Request $request)
    {
        // $request->user()->tokens()->delete(); // elimina todos los tokens del usuario

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Logged out successfully'
        // ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
