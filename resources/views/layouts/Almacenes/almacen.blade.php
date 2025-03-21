@section('title', 'ERP | Almacen')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col">
        <div class="container">
            <div class="flex flex-row gap-4 items-center mb-4">
                <h2 class="text-base">
                    <span class="font-bold">Almacén: </span>
                    {{ $almacen->nombre }}
                </h2>
    
                <p class="text-base">
                    <span class="font-bold">Ubicación: </span>
                    {{ $almacen->ubicacion }}
                </p>
            </div>
    
            @section('campo1', 'Precio Compra')
            @section('campo2', 'Precio Venta')
            @section('campo3', 'IVA')
            @section('campo4', 'Descripcion')
            @section('campo7', 'Stock')
    
            @include('layouts._partials.secciones')

            @if($almacen->productos->isEmpty())
                <p>No hay registros</p>
            @else
                
                @foreach($almacen->productos as $producto)

                    <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between md:flex-nowrap">

                        <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                            <p class="w-[175px] text-wrap">{{ $producto-> nombre }}</p>
        
                            <p class="w-[95px]">{{ $producto-> precio_compra }}€</p>
        
                            <p class="w-[115px]">{{ $producto-> precio_venta }}€</p>
                            
                            <p class="w-[225px]">{{ $producto-> iva}}%</p>
                            
                            <p class="w-[425px] text-wrap">{{ $producto -> descripcion}}</p>

                            <p class="w-[95px] text-wrap">{{ $producto->pivot-> stock}}</p>
        
                        </div>
        
                        <div class="flex flex-row items-center gap-2">
        
                        {{-- Debe permitirme editar solo el stock --}}
        
                            <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                                <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                            </a>
                
                            <img
                                data-action="{{ route('almacen.destroy', $almacen->id) }}"
                                id="warning-img"
                                src="{{ asset('assets/icons/trash-icon.svg') }}"
                                class="warning-img w-[24px] h-[24px] rounded-lg cursor-pointer"
                            >
                        </div>
        
                    </div>
                @endforeach
                
            @endif
        </div>
        {{-- @section('campo1', 'Producto')
        @section('campo2', 'Stock')
        @section('campo4', 'P. Venta')
        @section('campo5', 'P. Compra')
        @section('campo6', 'IVA')

        @include('layouts._partials.secciones')

        @foreach($almacen->producto as $producto)

        <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
            <p class="w-[175px]">{{ $almacen -> nombre }}</p>

            <p class="w-[190px]">{{ $producto -> nombre }}</p>

            <p class="w-[95px]">{{ $producto->pivot-> stock }}</p>
            
            <p class="w-[225px]">{{ $producto-> precio_compra }}</p>

            <p class="w-[225px]">{{ $producto-> precio_venta }}</p>

            <p class="w-[225px]">{{ $producto-> iva }}</p>

        </div>

        @empty
            <p>No hay registros</p>
        @endforelse --}}
            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>
@endsection