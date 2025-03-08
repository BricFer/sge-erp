@section('title', 'ERP | Producto')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('producto.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.home'),
            'gridUrl' => route('producto.grid')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col items-center">

        <div>
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $producto -> nombre }}</h2>
        
            <p>
                <span class="font-bold">Precio compra:</span> {{ $producto -> precio_compra }}€
            </p>
        
            <p>
                <span class="font-bold">Precio venta:</span> {{ $producto -> precio_venta }}€
            </p>
        
            <p>
                <span class="font-bold">IVA:</span> {{ ($producto -> iva) * 100 }}%
            </p>
        
            <p>
                <span class="font-bold">Descripcion:</span> {{ $producto -> descripcion }}
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('producto.edit', ['producto' => $producto->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <img
                data-action="{{ route('producto.destroy', $producto->id) }}"
                src="{{ asset('assets/icons/trash-icon.svg') }}"
                alt="delete icon"
                class="warning-img block w-[24px] h-[24px] rounded-lg cursor-pointer"
            >
            </div>

            <a
                href="{{ route('producto.grid') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>

@endsection