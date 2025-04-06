@section('title', 'ERP | Editar factura')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('factura.home')])
    </div>

    <form
        method="POST"
        action="{{ route('factura.update', $factura->id) }}"
        class="flex flex-col w-full gap-6 border-solid border-2 border-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/50 xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        
        <div class="w-full p-6">

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase text-black/70">factura</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[205px]">
                    <label
                        for="facturable_type"
                        class="w-full"
                    >
                        Factura de:
                    </label>
                    <input
                        id="facturable_type"
                        name="facturable_type"
                        value="{{ $factura->facturable_type}}"
                        readonly
                    />
                </div>

                <div class="flex flex-col gap-1 w-[456px]">
                    <label class="w-full">ID | Nombre:</label>
                    <div class="w-full flex gap-1">
                        <input
                            name="facturable_id"
                            value="{{ $factura->facturable_id}}"
                            class="w-[45px] border-solid border border-black/50"
                        />
        
                        <input
                            type="text"
                            class="w-[405px]"
                            value="{{ $factura->facturable->nombre_completo }}"
                            readonly
                        />
            
                    </div>
                </div>
        
                <div class="flex flex-col gap-1 w-[215px]">
                    <label class="w-full">DNI/NIF</label>
                    <p id="dni_nif" class="h-[42px] p-2 w-full border-solid border border-black/50">{{ $factura->facturable->nif}}</p>
                </div>
        
                <div class="flex flex-col w-[315px] gap-1">
                    <label class="w-full">Razón Social</label>
                    <p id="razon_social" class="h-[42px] w-full p-2 border-solid border border-black/50">{{ $factura->facturable->razon_social}}</p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[215px]">
                    <label for="serie" class="w-full">Cod. Ref. Factura</label>
                    <input
                        name="serie"
                        type="text"
                        id="serie"
                        class="w-full"
                        value="{{ $factura->serie }}"
                        readonly
                    />
                </div>

                <div class="flex flex-col gap-1 w-[416px]">
                    <label class="w-full">Dirección</label>
                    <p id="domicilio" class="h-[42px] w-full p-2 border-solid border border-black/50">{{ $factura->facturable->domicilio}}</p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[281px]">
                    <label>Población</label>
                    <p id="poblacion" class="h-[42px] p-2 border-solid border border-black/50 w-full">{{ $factura->facturable->poblacion}}</p>
                </div>

                <div class="flex flex-col gap-1 w-[278px]">
                    <label>Provincia</label>
                    <p id="provincia" class="h-[42px] p-2 border-solid border border-black/50 w-full">{{ $factura->facturable->provincia}}</p>
                </div>

                <div class="flex flex-col gap-1 w-[176px]">
                    <label>Cod. Postal</label>
                    <p id="cod_postal" class="h-[42px] w-full p-2 border-solid border border-black/50">{{ $factura->facturable->cod_postal}}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="descuento_general" class="w-full">Descuento (%)</label>
                    <input
                        type="text"
                        id="descuento_general"
                        class="calcularSubtotal w-full"
                        name="descuento"
                    />
                </div>
            </div>

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 my-6 text-lg font-bold uppercase text-black/70">Datos empleado</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[456px]">
                    <label class="w-full" id="id_empleado">Empleado:</label>
                    <div class="w-full flex gap-1">
                        <input
                            name="id_empleado"
                            type="text"
                            id="empleados"
                            class="w-[42px]"
                            value="{{$factura->id_empleado}}"
                        />

                        <p class="h-[42px] w-[405px] p-2 border-solid border border-black/50">
                            {{ $factura->empleado->nombre}}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="w-full">DNI/NIF</label>
                    <p class="h-[42px] w-[215px] p-2 border-solid border border-black/50">
                        {{ $factura->empleado->dni_nif}}
                    </p>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="w-full">Cargo</label>
                    <p id="cargo_empleado" class="h-[42px] w-[516px] p-2 border-solid border border-black/50">
                        {{ $factura->empleado->cargo}}
                    </p>
                </div>
            </div>
        </div>

        <div class="w-full border-y-solid border-y-2 border-y-indigo-600/25 flex flex-row gap-1 justify-between items-center font-bold py-2 px-4">
            <p class="w-[295px]">Producto</p>
            <p class="w-[175px]">Código</p>
            <p class="w-[325px]">Descripción</p>
            <p class="w-[75px]">Cant.</p>
            <p class="w-[75px]">IVA</p>
            <p class="w-[75px]">Precio (€)</p>
            <p class="w-[75px]">Dto. (%)</p>
            <p class="w-[95px]">Subtotal</p>
        </div>

        <div id="detalles">
            <div class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">
                <select
                    name="id_producto[]"
                    onchange="completarDetalleFactura(this)"
                    class="productos w-[295px] border-none p-0"
                >
                    <option
                        disabled
                        selected
                    >
                        Lista productos
                    </option>

                    @foreach($productos as $producto)
                    
                    @php
                        $stock = $producto->almacenes->first()?->pivot->stock ?? 'Sin stock';
                    @endphp

                        <option
                            value="{{ $producto->id}}"
                            data-info='@json($producto)'
                        >
                            {{ $producto->nombre }} - {{ $stock}}
                        </option>

                    @endforeach
                </select>

                <input
                    type="text"
                    placeholder="Código producto"
                    class="codigo w-[175px] border-none p-0"
                />

                <input
                    type="text"
                    placeholder="Descripcion"
                    class="descripcion w-[325px] border-none p-0"
                />

                <input
                    type="number"
                    name="cantidad[]"
                    placeholder="Cant."
                    min="1"
                    max="99"
                    class="cantidad calcularSubtotal w-[75px] border-none p-0"
                />
                
                <input
                    type="number"
                    name="iva[]"
                    placeholder="%IVA"
                    min="0"
                    max="99"
                    class="iva calcularSubtotal w-[75px] border-none p-0"
                />

                <input
                    type="text"
                    placeholder="P.V"
                    name="precio[]"
                    class="precio_venta w-[75px] border-none p-0"
                    readonly
                />

                <input
                    type="text"
                    name="descuento[]"
                    placeholder="%"
                    class="descuento calcularSubtotal w-[75px] border-none p-0"
                    readonly
                />
                
                <input
                    type="text"
                    name="subtotal[]"
                    placeholder="Subtotal"
                    class="subtotal w-[95px] border-none p-0"
                />
            </div>
        </div>

        <div class="flex flex-col ml-auto gap-2">
            <div class="flex flex-row gap-2 px-4">
                <label
                    class="w-[95px]"
                    for="monto_subtotal"
                >
                    Subtotal
                </label>
                <input
                    type="text"
                    id="monto_subtotal"
                    name="monto_subtotal"
                    class="w-[215px]"
                    value="{{ $factura->monto_subtotal}}"
                />
            </div>

            <div class="flex flex-row gap-2 px-4">
                <label
                    class="w-[95px]"
                    for="monto_descuento"
                >
                    Descuento
                </label>
                <input
                    type="text"
                    id="monto_descuento"
                    name="monto_descuento"
                    class="w-[215px]"
                    value="{{ $factura->monto_descuento}}"
                />
            </div>

            <div class="flex flex-row gap-2 px-4">
                <label
                    class="w-[95px]"
                    for="monto_iva"
                >
                    IVA
                </label>
                <input
                    type="text"
                    id="monto_iva"
                    name="monto_iva"
                    class="w-[215px]"
                    value="{{ $factura->monto_iva}}"
                />
            </div>
            
            <div class="flex flex-row gap-2 px-4">
                <label
                    class="w-[95px]"
                    for="monto_total"
                >
                    Total
                </label>
                <input
                    type="text"
                    id="monto_total"
                    name="monto_total"
                    class="w-[215px]"
                    value="{{ $factura->monto_total}}"
                />
            </div>

        </div>
        <div class="pl-4">
            @include('layouts._partials.submit-cancel')
        </div>
    </form>
    <script>

        // Los productos han de pasarse a un array ya que de lo contrario estoy pasando un objeto de Eloquent que no se reconocerá
        window.productos = @json($productos->toArray());
        
        // Este es un paso adicional que ha de hacerse ya que el paso anterior lo que me devuelve es un objeto cuya clave es un índice
        const productosArray = Object.values(window.productos);

        // Al hacer lo anterior ya el script factura.js recibe y procesa los productos para mostrarlos
        
    </script>

    <script src="{{ asset('js/factura.js') }}" defer></script>
@endsection