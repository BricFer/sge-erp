@section('title', 'ERP | Factura')

@extends('dashboard')

@section('content')
    <div>

        {{-- Revisar que de estas secciones se queda y que se va --}}
        @include('layouts._partials.nav-bar', ['backUrl' => route('servicio.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('servicio.crear'),
            'listUrl' => route('servicio.home'),
            'gridUrl' => route('servicio.grid')])
    </div>
    
    <div class="max-w-7xl h-screen p-16 m-auto w-full">

        <div class="text-sm/7 w-full flex flex-col gap-2">
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $servicio -> nombre }}</h2>
            
            <p>
                <span class="font-bold">Tipo de servicio:</span> {{ $servicio-> tipo_servicio}}
            </p>
            
            <p>
                <span class="font-bold">Precio:</span> {{ $servicio-> precio}}€
            </p>
        
            <p>
                <span class="font-bold">Descripción:</span> {{ $servicio-> descripcion }}
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('servicio.edit', ['servicio' => $servicio->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <img
                    data-action="{{ route('servicio.destroy', $servicio->id) }}"
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    alt="delete icon"
                    class="warning-img block w-[24px] h-[24px] cursor-pointer"
                >
            </div>

            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 my-8 text-white rounded-lg w-36 ml-auto hover:bg-teal-500 hover:border-teal-500"
            >
                Regresar
            </a>
        </div>
    </div>

@endsection