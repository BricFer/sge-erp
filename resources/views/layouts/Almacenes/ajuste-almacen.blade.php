@extends('dashboard')

@section('content')

<div>
    @include('layouts._partials.messages')

    @include('layouts._partials.nav-bar', [
        'backUrl' => route('almacen.home'),
        'downloadUrl',
        ])

    @include('layouts._partials.buscar', [
        'addUrl' => route('almacen.crear'),
        'listUrl' => route('almacen.home'),
        'gridUrl' => route('almacen.grid')])
</div>

<div class="text-sm/7 w-full flex flex-col">
    
    <div class="container">
        
        @section('campo2', 'P. Compra')
        @section('campo3', 'SKU')
        @section('campo4', 'Stock')
        @section('campo5', 'N. Stock')
        @section('campo6', 'Estado')

        @include('layouts._partials.secciones')

        @foreach($almacen->productos as $producto)
            @php
                // Dependendiendo del estado del stock asignamos un color diferente
            
                if( $producto->pivot->stock <= 0 )
                {
                    $estado = 'text-red-600';
                    $texto = 'Sin Stock';
                }
                elseif ( $producto->pivot->stock <= 20 ) {
                    $estado = 'text-orange-500';
                    $texto = 'Stock bajo';
                }
                else {
                    $estado = 'text-green-600';
                    $texto = 'En Sotck';
                };
            
            @endphp

            <div class="flex flex-row px-4 py-2 text-nowrap items-center gap-6">
                <p class="w-[175px]">{{ $producto->nombre }}</p>
                <p class="w-[95px]"></p>

                <p class="w-[115px]">{{ $producto->precio_compra }}€</p>
                <p class="w-[225px]">{{ $producto->codigo }}</p>
                <p class="w-[95px]">{{ $producto->pivot->stock }}</p>
                <form
                    id="stock-{{ $producto->id }}"
                    action="{{ route('almacen.stock', [$almacen->id, $producto->id]) }}"
                    method="post"
                    class="flex flex-row items-center bg-transparent m-0 w-[175px]"
                >
                    @method('PUT')
                    @csrf
                    <input
                        type="text"
                        name="stock"
                        value="{{ $producto->pivot->stock }}"
                        class="w-[75px] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                    />
                </form>
                <p class="w-[95px] font-bold {{ $estado }}">
                    {{ $texto }}
                </p>
            </div>

        @endforeach

    </div>

    @include('layouts._partials.regresar')
</div>