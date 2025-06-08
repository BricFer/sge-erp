@section('title', 'ERP | Proveedor')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('proveedor.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.lista'),
            'gridUrl' => route('proveedor.home')])
    </div>

    <div class="text-sm/7 w-full flex flex-col">

        <div class="w-full">
            
            <div class="flex flex-col gap-2 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">

                <h2 class="text-base">
                    <span class="font-bold">Proveedor: </span>
                    {{ $proveedor -> nombre_completo }}
                </h2>
            
                <p>
                    <span class="font-bold">Cod.Proveedor:</span> {{ $proveedor-> cod_proveedor}}
                </p>

                <p>
                    <span class="font-bold">CIF:</span> {{ $proveedor-> cif}}
                </p>
            
                <p>
                    <span class="font-bold">Razon social:</span> {{ $proveedor-> razon_social}}
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

                <div class="flex flex-row gap-2 mt-4 w-full">
    
                    <a class="block ml-auto" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('proveedor.destroy', $proveedor->id) }}"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        alt="delete icon"
                        class="warning-img block w-[24px] h-[24px] rounded-lg cursor-pointer"
                    >
                </div>
            </div>

            
            @section('campo1', 'Serie')
            @section('campo2', 'Emitida por')
            @section('campo3', 'F. Emisión')
            @section('campo4', 'Subtotal')
            @section('campo5', 'Descuento')
            @section('campo6', 'Total')
            @section('campo7', 'Estado')

            @include('layouts._partials.secciones')

            @if($proveedor->facturas->isEmpty())
                <p>No hay registros</p>
            @else
                
                @foreach($proveedor->facturas as $factura)

                    <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between md:flex-nowrap">

                        <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                            <p class="w-[175px]">{{ $factura->facturable->nombre_completo }}</p>

                            <p class="w-[95px]">{{ $factura->serie }}</p>
        
                            <p class="w-[115px]">{{ $factura->empleado->nombre }}</p>
                            
                            <p class="w-[225px]">{{ $factura->fecha_emision}}</p>
                            
                            <p class="w-[95px]">{{ $factura->monto_subtotal }}€</p>
        
                            <p class="w-[175px]">{{ $factura->monto_descuento }}€</p>
        
                            <p class="w-[95px]">{{ $factura->monto_total }}€</p>
                            
                            <p class="w-[225px]">{{ ucfirst($factura->estado) }}</p>
        
                        </div>
        
                        <div class="flex flex-row items-center gap-2">
        
                            <a class="block" href="{{ route('factura.compras.productos', ['factura' => $factura->id]) }}">
                                <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                            </a>
                
                            <img
                                data-action="{{ route('factura.destroy', $factura->id) }}"
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