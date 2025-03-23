@section('title', 'ERP | Crear factura')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('factura.home')])

    </div>

    <form
        method="POST"
        action="{{ route('factura.store') }}"
        class="flex flex-col w-full gap-6 border-solid border-2 border-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/50 xl:max-w-7xl xl:m-auto"
    >
        @csrf
        
        <div class="w-full p-6">

            <div class="flex flex-col gap-1">
                <label for="clientes">Cliente:</label>
                <input
                    name="id_cliente"
                    type="text"
                    id="id_cliente"
                    readonly
                />

                <select
                    name="cliente"
                    type="text"
                    id="clientes"
                    onchange="autocompletarInputs()"
                >
            
                    <option class="font-bold" value="" disabled selected>Seleccionar cliente</option>

                    @foreach ($clientes as $cliente)
                        <option
                            value="nombre_completo"
                            readonly
                            {{-- Esto obtendrá un JSON por lo que TIENE que ir con comillas simples de lo contrario se creará una mala estructura en el JSON --}}
                            data-info='@json($cliente)'
                        >
                            {{ $cliente->nombre_completo }}
                        </option>
                    @endforeach
    
                </select>
            </div>
    
            <div class="flex flex-col gap-1">
                <label for="dni_nif">DNI/NIF</label>
                <input
                    name="dni_nif"
                    type="text"
                    id="dni_nif"
                    readonly
                />
            </div>
    
            <div class="flex flex-col gap-1">
                <label for="razon_social">Razón Social</label>
                <input
                    name="razon_social"
                    type="text"
                    id="razon_social"
                    readonly
                >
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="serie">Cod. Ref</label>
                <input
                    name="serie"
                    type="text"
                    id="serie"
                    value="{{ date("Y") }}/{{ $nextId }}"
                    readonly
                />
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="domicilio">Dirección</label>
                <input name="domicilio" type="text" id="domicilio" >
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="poblacion">Población</label>
                <input name="poblacion" type="text" id="poblacion" >
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="provincia">Provincia</label>
                <input name="provincia" type="text" id="provincia" >
            </div>

            <div class="flex flex-col gap-1">
                <label for="cod_postal">Cod. Postal</label>
                <input name="cod_postal" type="text" id="cod_postal" >
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="descuento">Descuento (%)</label>
                <input name="descuento" type="text" id="descuento" class="calcularSubtotal">
            </div>

        </div>

        <div class="w-full border-y-solid border-y-2 border-y-indigo-600/25 flex flex-row gap-1 justify-between items-center font-bold py-2 px-4">
            <p class="w-[295px]">Producto</p>
            <p class="w-[175px]">Código</p>
            <p class="w-[325px]">Descripción</p>
            <p class="w-[75px]">Cant.</p>
            <p class="w-[75px]">Precio (€)</p>
            <p class="w-[75px]">Dto. (%)</p>
            <p class="w-[95px]">Subtotal</p>
        </div>

        <div class="w-full flex flex-row justify-between items-center py-2 px-4 m-0">
            <select
                name="productos"
                id="productos"
                onchange="completarDetalleFactura()"
                class="w-[295px] border-none p-0"
            >
                <option
                    value=""
                    name="default_value"
                    disabled
                    selected
                >
                    Lista productos
                </option>

                @foreach($productos as $producto)
                
                    <option
                        name="id_producto"
                        value="{{ $producto->id}}"
                        data-info='@json($producto)'
                    >
                        {{ $producto->nombre }}
                    </option>

                @endforeach
            </select>

            <input
                type="text"
                id="codigo"
                name="codigo"
                placeholder="Código producto"
                class="w-[175px] border-none p-0"
            />

            <input
                type="text"
                id="descripcion"
                name="descripcion"
                placeholder="Descripcion"
                class="w-[325px] border-none p-0"
            />

            <input
                type="number"
                id="cantidad"
                name="cantidad"
                placeholder="Cant."
                min="1"
                max="99"
                class="calcularSubtotal w-[75px] border-none p-0"
            />

            <input
                type="text"
                id="precio_venta"
                name="precio_venta"
                placeholder="P.V"
                class="w-[75px] border-none p-0"
            />

            <input
                type="text"
                id="descuento_producto"
                name="descuento_producto"
                placeholder="%"
                class="calcularSubtotal w-[75px] border-none p-0"
            />
            
            <input
                type="text"
                id="subtotal"
                name="subtotal"
                placeholder="Subtotal"
                class="w-[95px] border-none p-0"

            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>

    <script src="{{ asset('js/factura.js') }}" defer></script>
@endsection