@php
    // Dependendiendo del estado del empleado asignamos un color diferente

    $estado = match ($empleado->estado) {
        'baja voluntaria' => 'text-blue-700',
        'excedencia' => 'text-orange-500',
        'despido' => 'text-red-600',
        'activo' => 'text-green-600',
        default => 'text-gray-600',
    };

@endphp

@section('title', 'ERP | Empleado')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>
    
    <div class="max-w-7xl h-screen p-16 m-auto w-full">

        <div class="text-sm/7 w-full flex flex-col gap-2">
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $empleado -> nombre }}</h2>
        
            <p>
                <span class="font-bold">DNI/NIF:</span> {{ $empleado-> dni_nif}}
            </p>

            <p>
                <span class="font-bold">Cargo:</span> {{ $empleado-> cargo}}
            </p>
        
            <p>
                <span class="font-bold">Teléfono:</span> {{ $empleado-> telefono}}
            </p>
        
            <p>
                <span class="font-bold">Correo:</span> {{ $empleado-> correo}}
            </p>

            <p>
                <span class="font-bold">Fecha de contratación:</span> {{ $empleado-> fecha_contratacion}}
            </p>

            <p>
                <span class="font-bold">Estado: </span>
                <span class="font-bold {{ $estado }}">{{ ucfirst($empleado-> estado) }}</span>
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <img
                    data-action="{{ route('empleado.destroy', $empleado->id) }}"
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    alt="delete icon"
                    class="warning-img w-[24px] h-[24px] cursor-pointer"
                >
            </div>

            @include('layouts._partials.regresar')
        </div>
    </div>

@endsection