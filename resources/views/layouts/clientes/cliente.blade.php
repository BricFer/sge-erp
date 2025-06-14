@section('title', 'ERP | Cliente')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('cliente.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.lista'),
            'gridUrl' => route('cliente.home')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col">
        <div class="w-full">
            <div class="flex flex-col gap-2 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <h2 class="text-base">
                    <span class="font-bold">Cliente: </span>
                    {{ $cliente -> nombre_completo }}
                </h2>
    
                <p>
                    <span class="font-bold">Cod. Cliente:</span> {{ $cliente-> cod_cliente}}
                </p>

                <p>
                    <span class="font-bold">NIF:</span> {{ $cliente-> nif}}
                </p>
    
                @if( !empty($cliente->razon_social) )
                    <p>
                        <span class="font-bold">Razon social:</span> {{ $cliente-> razon_social}}
                    </p>
                @endif
            
                <p>
                    <span class="font-bold">Dirección:</span> {{ $cliente-> domicilio}}
                </p>
            
                <p>
                    <span class="font-bold">Código postal:</span> {{ $cliente-> cod_postal}}
                </p>
            
                <p>
                    <span class="font-bold">Población:</span> {{ $cliente-> poblacion}}
                </p>
            
                <p>
                    <span class="font-bold">Provincia:</span> {{ $cliente-> provincia}}
                </p>
            
                <p>
                    <span class="font-bold">Teléfono:</span> {{ $cliente-> telefono}}
                </p>
            
                <p>
                    <span class="font-bold">Correo:</span> {{ $cliente-> correo}}
                </p>

                <div class="flex flex-row gap-2 mt-4 w-full">
    
                    <a class="block ml-auto" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('cliente.destroy', $cliente->id) }}"
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

            @if($cliente->facturas->isEmpty())
                <p>No hay registros</p>
            @else
                
                @foreach($cliente->facturas as $factura)

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
        
                            <a class="block" href="{{ route('factura.ventas.productos', ['factura' => $factura->id]) }}">
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