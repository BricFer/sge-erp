@section('title', 'ERP | Factura Compras')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('factura.compras')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('factura.crear.compras'),
            'listUrl' => route('factura.compras'),
            'gridUrl' => route('factura.comprasgrid')])
    </div>
    
    <div class="max-w-7xl h-screen p-16 m-auto w-full">

        @php
            $esProveedor = str_contains($factura->facturable_type, 'Proveedor');
        @endphp

        <div class="flex flex-col gap-2 mb-4 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">

            <div class="flex flex-row gap-2">
                <img
                data-action="{{ route('factura.destroy', $factura->id) }}"
                src="{{ asset('assets/icons/trash-icon.svg') }}"
                alt="delete icon"
                class="warning-img block ml-auto w-[24px] h-[24px] cursor-pointer"
                >
            </div>
            
            <div class="w-full p-6 flex flex-col gap-8">

                <div class="w-full">
                    <h2 class="w-full border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase">Datos factura</h2>
                    
                    <div class="w-full flex gap-6 justify-content">

                        <div class="w-[50%]">
                            <p>
                                <strong>Serie: </strong>
                                {{$factura->serie}}
                            </p>
                            <p>
                                <strong>Total: </strong>
                                {{ $factura->monto_total}}€
                            </p>
                            <p>
                                <strong>Descuento: </strong>
                                {{ $factura->porcentaje_descuento}}%
                            </p>
                            <p>
                                <strong>Estado: </strong>
                                {{ ucfirst($factura->estado) }}
                            </p>
                        </div>

                        <div class="w-[50%]">
                            <p>
                                <strong>Fecha emisión: </strong>
                                {{$factura->fecha_emision}}
                            </p>
                            <p>
                                <strong>Almacén destino: </strong>
                                {{ $factura->almacen->ubicacion}}
                            </p>
                            
                        </div>
                        
                    </div>
                </div>

                <div class="w-full flex gap-6 justify-content">
                    <div class="w-[50%]">
                        <h2 class="w-full border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase">Datos Proveedor</h2>
        
                        <div class="flex flex-col gap-1">
                            <p>
                                <strong>ID interno: </strong>
                                {{$factura->facturable_id}}
                            </p>
                            <p>
                                @if( $esProveedor )
                                    <strong>Emitida por: </strong>
                                @endif
    
                                {{$factura->facturable->nombre_completo}}
                            </p>
    
                            <p>
                                <strong>ID legal: </strong>
                                @if( $esProveedor )
                                    {{ $factura->facturable->cif }}
                                @else
                                    No aplica
                                @endif
                            </p>
                            
                            @if( !$factura->facturable->razon_social === null || !empty($factura->facturable->razon_social) )
                                <p>
                                    <strong>Razon social: </strong>
                                    {{ $factura->facturable->razon_social }}
                                </p>
                            @endif

                            <p>
                                <strong>Dirección: </strong>
                                {{ $factura->facturable->domicilio }}
                            </p>
                            
                            <p>
                                <strong>Población: </strong>
                                {{ $factura->facturable->poblacion }}
                            </p>
    
                            <p>
                                <strong>Provincia: </strong>
                                {{ $factura->facturable->provincia }}
                            </p>
                            <p>
                                <strong>Cod. Postal: </strong>
                                {{ $factura->facturable->cod_postal }}
                            </p>

                        </div>
                    </div>

                    <div class="w-[50%]">
                        <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase">Datos empleado</h2>
    
                        <div class="flex flex-col gap-1">

                            <p>
                                <strong>Legajo: </strong>
                                {{ $factura->empleado->id }}
                            </p>

                            <p>
                                @if( $esProveedor ) 
                                    <strong>Recepcionada por: </strong>
                                @endif
                                {{ $factura->empleado->nombre_completo }}
                            </p>

                            <p>
                                <strong>Cargo: </strong>
                                {{ $factura->empleado->cargo }}
                            </p>

                        </div>
                    </div>

                </div>

                <div class="w-full flex flex-col gap-2">
                    <h2 class="w-full border-b-solid border-b-2 border-b-indigo-600/30 text-lg font-bold uppercase">Detalles</h2>

                    <div class="w-full flex flex-row gap-1 justify-between items-center font-bold border-b-solid border-b-2 border-b-indigo-600/30 pb-2">
                        <p class="w-[50px]">#</p>
                        <p class="w-[295px]">Producto</p>
                        <p class="w-[175px]">Código</p>
                        <p class="w-[75px]">Cant.</p>
                        <p class="w-[75px]">IVA</p>
                        <p class="w-[75px]">Precio (€)</p>
                        <p class="w-[75px]">Dto. (€)</p>
                        <p class="w-[95px]">Subtotal (€)</p>
                    </div>

                    @foreach( $factura->productos as $producto )

                        <div class="w-full flex flex-row gap-1 justify-between items-center border-b-solid border-b-2 border-b-indigo-600/30 pb-2">

                            <p class="w-[50px]">{{ $producto->pivot->num_linea}}</p>
                            <p class="w-[295px]">{{ $producto->nombre}}</p>
                            <p class="w-[175px]">{{ $producto->codigo}}</p>
                            <p class="w-[75px]">{{ $producto->pivot->cantidad}}</p>
                            <p class="w-[75px]">{{ $producto->iva}}</p>
                            <p class="w-[75px]">{{ $producto->precio_venta}}</p>
                            <p class="w-[75px]">{{ $producto->pivot->descuento}}</p>
                            <p class="w-[95px]">{{ $producto->pivot->subtotal}}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col w-[175px] justify-end ml-auto gap-2">
                    
                        <p class="flex flex-row gap-6 justify-between border-b-solid border-b-2 border-b-indigo-600/30">
                            <strong>Subtotal </strong>
                            {{ $factura->monto_subtotal}}€
                        </p>
                        <p class="flex flex-row gap-6 justify-between border-b-solid border-b-2 border-b-indigo-600/30">
                            <strong>Descuento </strong>
                            {{ $factura->monto_descuento}}€
                        </p>
                        <p class="flex flex-row gap-6 justify-between border-b-solid border-b-2 border-b-indigo-600/30">
                            <strong>IVA </strong>
                            {{ $factura->monto_iva}}€
                        </p>
        
                </div>

            </div>
            
        </div>

        <div class="flex gap-4">

            @include('layouts._partials.regresar')
            @include('layouts._partials.descargar', ['downloadUrl'])
        </div>
            
    </div>
        
@endsection