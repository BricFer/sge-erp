@section('title', 'ERP | Empleado')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts.empleados.buscar')
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
                    <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <form
                    method="POST"
                    action="{{ route('empleado.destroy', $empleado->id) }}"
                >
                    @csrf
                    @method('DELETE')
                    <input
                        type="submit"
                        class="w-[24px] h-[24px] bg-[url('../../../../public/assets/icons/trash-icon.svg')] bg-no-repeat bg-cover bg-center text-transparent font-bold rounded-lg cursor-pointer border-none"
                    />
                </form>
            </div>

            <a
                href="{{ route('empleado.grid') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>

@endsection