@section('title', 'ERP | Crear factura')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('factura.home')])
    </div>

    <form
        id="factura-form"
        method="POST"
        action="{{ route('factura.store') }}"
        class="flex flex-col w-full gap-6 border-solid border-2 border-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/50 xl:max-w-7xl xl:m-auto"
    >
        @csrf
        
        <div class="w-full p-6">

            <div class="flex flex-col gap-1">
                <label>Cliente:</label>
                <p id="id_cliente" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>

                <select
                    name="facturable_id"
                    type="text"
                    id="clientes"
                    onchange="autocompletarInputs()"
                >
            
                    <option class="font-bold" value="" disabled selected>Seleccionar cliente</option>

                    @foreach ($clientes as $cliente)
                        <option
                            value="{{$cliente->id}}"
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
                <p id="dni_nif" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
            </div>
    
            <div class="flex flex-col gap-1">
                <label for="razon_social">Razón Social</label>
                <p id="razon_social" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
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
                <label>Dirección</label>
                <p id="domicilio" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
            </div>
            
            <div class="flex flex-col gap-1">
                <label>Población</label>
                <p id="poblacion" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
            </div>
            
            <div class="flex flex-col gap-1">
                <label>Provincia</label>
                <p id="provincia" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
            </div>

            <div class="flex flex-col gap-1">
                <label>Cod. Postal</label>
                <p id="cod_postal" class="h-[40px] p-2 border-solid border border-black/50 w-full"></p>
            </div>
            
            <div class="flex flex-col gap-1">
                <label for="descuento_general">Descuento (%)</label>
                <input type="text" id="descuento_general" class="calcularSubtotal">
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
                    
                        <option
                            value="{{ $producto->id}}"
                            data-info='@json($producto)'
                        >
                            {{ $producto->nombre }}
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
                    type="text"
                    placeholder="P.V"
                    class="precio_venta w-[75px] border-none p-0"
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