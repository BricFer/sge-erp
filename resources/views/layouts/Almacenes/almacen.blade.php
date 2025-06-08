@section('title', 'ERP | Almacen')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col">
        <div class="w-full">

            <div class="flex flex-col gap-4 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <div class="flex flex-col gap-4">
                    <h2 class="text-base">
                        <span class="font-bold">Almacén: </span>
                        {{ $almacen->nombre }}
                    </h2>
        
                    <p class="text-base">
                        <span class="font-bold">Responsable: </span>
                        {{ $almacen->empleado ? $almacen->empleado->nombre_completo : 'Sin responsable' }}
                    </p>
    
                    <p class="text-base">
                        <span class="font-bold">Vol. almacen: </span>
                        {{ $almacen->capacidad }}m³
                    </p>
    
                    <p class="text-base">
                        <span class="font-bold">Estado: </span>
                        <span
                            class="{{ $almacen->estado == 'activo' ? 'text-green-500 font-bold' : '' }}"
                        >
                            {{ ucfirst($almacen->estado) }}
                        </span>
                    </p>
                </div>

                <div class="flex flex-row items-center gap-2">
    
                    <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
                    <a
                        href="{{ route('almacen.inventario', $almacen->id) }}"
                        class="block w-[24px] h-[24px]"
                    >
                        <img class="block w-full" src="{{ asset('assets/icons/stock.svg') }}" alt="stock button">
                    </a>
                    <img
                        data-action="{{ route('almacen.destroy', $almacen->id) }}"
                        id="warning-img"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        class="warning-img w-[24px] h-[24px] rounded-lg cursor-pointer"
                    >
                </div>

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
                            <p class="w-[175px] text-wrap">{{ $producto->nombre }}</p>
        
                            <p class="w-[95px]">{{ $producto-> precio_compra }}€</p>
        
                            <p class="w-[115px]">{{ $producto-> precio_venta }}€</p>
                            
                            <p class="w-[225px]">{{ $producto-> iva}}%</p>
                            
                            <p class="w-[425px] text-wrap">{{ $producto -> descripcion}}</p>

                            <p class="w-[95px] text-wrap">{{ $producto->pivot-> stock}}</p>

                        </div>

                        <form
                            id="stock-{{ $producto->id }}"
                            action="{{ route('almacen.stock', [$almacen->id, $producto->id]) }}"
                            method="post"
                            class="flex flex-row items-center justify-center bg-transparent m-0 hidden"
                        >
                            @method('PUT')
                            @csrf
                            <input
                                type="text"
                                name="stock"
                                value="{{ $producto->pivot->stock }}"
                                class="w-[75px] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                            />

                            <input type="image" src="{{ asset('assets/icons/confirm-icon.svg') }}">

                            <button class="m-0 inline-block" onclick="ocultarFormulario('stock-{{ $producto->id }}')">
                                <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/x-icon.svg') }}" alt="cancel button">
                            </button>
                        </form>
        
                        <div class="flex flex-row items-center gap-2">
        
                        {{-- Debe permitirme editar solo el stock --}}
        
                            <button onclick="mostrarFormulario('stock-{{ $producto->id }}')">
                                <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                            </button>
                
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

        @include('layouts._partials.regresar')

    </div>
@endsection

<script>
    const mostrarFormulario = (idFormulario) => {
        document.getElementById(idFormulario).classList.remove('hidden');
    }

    const ocultarFormulario = (idFormulario) => {
        document.getElementById(idFormulario).classList.add('hidden');
    }
</script>