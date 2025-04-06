@php
    // Dependendiendo del estado del empleado asignamos un color diferente

    $estado = match ($empleado->estado) {
        'baja voluntaria' => 'text-blue-700',
        'excedencia' => 'text-orange-500',
        'despido' => 'text-red-600',
        'activo' => 'text-green-600',
        default => 'text-gray-600',
    };

@endphp

@section('title', 'ERP | Empleado')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col">
        <div class="container">
            <div class="flex flex-col gap-2 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $empleado -> nombre }}</h2>
            
                <p>
                    <span class="font-bold">DNI/NIF:</span> {{ $empleado-> dni_nif}}
                </p>

                <p>
                    <span class="font-bold">Cargo:</span> {{ $empleado-> cargo}}
                </p>
            
                <p>
                    <span class="font-bold">Teléfono:</span> {{ $empleado-> telefono}}
                </p>
            
                <p>
                    <span class="font-bold">Correo:</span> {{ $empleado-> correo}}
                </p>

                <p>
                    <span class="font-bold">Fecha de contratación:</span> {{ $empleado-> fecha_contratacion}}
                </p>

                <p>
                    <span class="font-bold">Estado: </span>
                    <span class="font-bold {{ $estado }}">{{ ucfirst($empleado-> estado) }}</span>
                </p>
            </div>

            @section('campo1', 'Serie')
            @section('campo2', 'Emitida por')
            @section('campo3', 'F. Emisión')
            @section('campo4', 'Subtotal')
            @section('campo5', 'Descuento')
            @section('campo6', 'Total')
            @section('campo7', 'Estado')

            @include('layouts._partials.secciones')

            @if($empleado->facturas->isEmpty())
                <p>No se han emitido facturas</p>
             @else
            
                @foreach($empleado->facturas as $factura)

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
        
                            <a class="block" href="{{ route('factura.edit', ['factura' => $factura->id]) }}">
                                <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
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