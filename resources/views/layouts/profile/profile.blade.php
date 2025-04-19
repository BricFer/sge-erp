@section('title', 'ERP | Perfil')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

    </div>
    
    <div class="text-sm/7 w-full flex flex-col">

        <div class="flex flex-col gap-4 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
            <h2 class="text-indigo-600 font-bold text-lg">Datos Empleado</h2>

            @php
                // Dependendiendo del estado del empleado asignamos un color diferente
            
                $estado = match ($user->empleado->estado) {
                    'baja voluntaria' => 'text-blue-700',
                    'excedencia' => 'text-orange-500',
                    'despido' => 'text-red-600',
                    'activo' => 'text-green-500',
                    default => 'text-gray-600',
                };
            
            @endphp
            
            <div class="card-body">
                <p><strong>Nombre de usuario:</strong> {{ $user->user }}</p>
                <p><strong>Cargo:</strong> {{ $user->empleado->cargo }}</p>
                <p><strong>Departamento:</strong> {{ $user->empleado->departamento }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Fecha de contratación:</strong> {{ $user->empleado->fecha_contratacion }}</p>

                {{-- Añadir el campo fin_contrato a la base de datos y añadirlo a la vista --}}
                @if($user->empleado?->estado === 'despido' || $user->empleado?->estado === 'baja voluntaria')
                    <p><strong>Fin de contrato:</strong> {{ $user->empleado->fecha_contratacion }}</p>
                @endif
                <p><strong>Estado: <span class="{{ $estado }}">{{ ucfirst($user->empleado->estado) }}</span></strong></p>

            </div>
        </div>
        

        <div class="flex items-end gap-4">
            <a
                href="{{ route('password.request') }}"
                class="block ml-auto text-center border-2 border-indigo-600 p-2 bg-indigo-600 text-white rounded-lg w-36 hover:bg-teal-500 hover:border-teal-500 hover:font-bold"
            >
                Editar perfil
            </a>
            <a
                href="{{ route('password.request') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 text-white rounded-lg w-36 hover:bg-teal-500 hover:border-teal-500 hover:font-bold"
            >
                Editar Contraseña
            </a>

        </div>
    </div>
@endsection


