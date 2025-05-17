@section('title', 'ERP | Producto')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('producto.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.home'),
            'gridUrl' => route('producto.grid')])
    </div>
    
    <div class="m-auto w-full flex flex-col justify-between gap-6">

        <div class="flex flex-col gap-2 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $producto -> nombre }}</h2>
        
            <p>
                <span class="font-bold">Precio compra:</span> {{ $producto -> precio_compra }}€
            </p>
        
            <p>
                <span class="font-bold">Precio venta:</span> {{ $producto -> precio_venta }}€
            </p>
        
            <p>
                <span class="font-bold">IVA:</span> {{ $producto -> iva }}%
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
                />
            </div>

        </div>

        <div class="w-full p-4 pb-4 relative">
            @if($producto->almacenes->isEmpty())
                <p>No hay registros</p>
            @else
                
                <div class="flex flex-row flex-wrap gap-6 text-nowrap bg-indigo-600 text-white p-4 items-center font-bold absolute top-0 right-0 left-0">
                    <p class="w-[175px]">Nombre</p>
                    <p class="w-[215px]">Responsable</p>
                    <p class="w-[315px]">Ubicación</p>
                    <p class="w-[115px]">Estado</p>
                    <p class="w-[95px]">Stock</p>
                </div>

                <div class="my-8"></div>
                
                @foreach($producto->almacenes as $almacen)

                    <div class="flex flex-row items-center gap-4 py-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between w-full md:flex-nowrap">

                        <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                            <p class="w-[175px] text-wrap">{{ $almacen-> nombre }}</p>
        
                            <p class="w-[215px]">{{ $almacen->empleados ? $almacen->empleados->nombre_completo : 'Sin responsable' }}</p>
        
                            <p class="w-[315px] text-wrap">{{ $almacen-> ubicacion }}</p>
                            
                            <p class="w-[115px]">{{ ucfirst($almacen-> estado) }}</p>

                            <p class="w-[95px] text-wrap">{{ $almacen->pivot-> stock}}</p>
        
                        </div>
        
                        <div class="flex flex-row items-center gap-2">
        
                            <a
                                class="block"
                                href="{{ route('almacen.productos', ['almacen' => $almacen->id]) }}"
                            >
                                <img
                                    class="block w-[24px] h-[24px]"
                                    src="{{ asset('assets/icons/show-icon.svg') }}"
                                    alt="show info button"
                                />
                            </a>
                        </div>
        
                    </div>
                @endforeach
                
            @endif
        </div>
        
        @include('layouts._partials.regresar')
    </div>

@endsection