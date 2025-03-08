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
    
    <div class="text-sm/7 w-full flex flex-col items-center">

        <div>
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $empleado -> nombre }}</h2>
        
            <p>
                <span class="font-bold">Cargo:</span> {{ $empleado-> rol}}
            </p>
        
            <p>
                <span class="font-bold">Teléfono:</span> {{ $empleado-> telefono}}
            </p>
        
            <p>
                <span class="font-bold">Correo:</span> {{ $empleado-> correo}}
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
                <a
                    href="{{ route('empleado.grid') }}"
                    class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
                >
                    Regresar
                </a>
            </div>
        </div>
    </div>

@endsection