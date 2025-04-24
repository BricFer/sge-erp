@section('title', 'ERP | Proveedor')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('proveedor.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.home'),
            'gridUrl' => route('proveedor.grid')])
    </div>

    <div class="max-w-7xl h-screen p-16 m-auto w-full">

        <div class="text-sm/7 w-full flex flex-col gap-2">
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $proveedor -> nombre_completo }}</h2>
        
            <p>
                <span class="font-bold">CIF:</span> {{ $proveedor-> cif}}
            </p>
        
            <p>
                <span class="font-bold">Dirección:</span> {{ $proveedor-> domicilio}}
            </p>
        
            <p>
                <span class="font-bold">Código postal:</span> {{ $proveedor-> cod_postal}}
            </p>
        
            <p>
                <span class="font-bold">Población:</span> {{ $proveedor-> poblacion}}
            </p>
        
            <p>
                <span class="font-bold">Provincia:</span> {{ $proveedor-> provincia}}
            </p>
        
            <p>
                <span class="font-bold">Teléfono:</span> {{ $proveedor-> telefono}}
            </p>
        
            <p>
                <span class="font-bold">Correo:</span> {{ $proveedor-> correo}}
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <img
                    data-action="{{ route('proveedor.destroy', $proveedor->id) }}"
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    alt="delete icon"
                    class="warning-img block w-[24px] h-[24px] rounded-lg cursor-pointer"
                >
            </div>

            @include('layouts._partials.regresar')
        </div>
    </div>

@endsection