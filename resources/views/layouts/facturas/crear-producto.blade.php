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

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase text-black/70">factura</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[205px]">
                    <label
                        for="facturable_type"
                        class="w-full"
                    >
                        Factura de:
                    </label>
                    <select
                        name="facturable_type"
                        required
                    >
                        <option
                            class="font-bold"
                            disabled
                            selected
                        >
                            Selecciona una opción
                        </option>
                        <option value="App\Models\Cliente">Cliente</option>
                        <option value="App\Models\Proveedor">Proveedor</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1 w-[456px]">
                    <label class="w-full">ID | Nombre:</label>
                    <div class="w-full flex gap-1">
                        <p id="id_cliente" class="h-[42px] w-[45px] p-2 border-solid border border-black/50"></p>
        
                        <select
                            name="facturable_id"
                            type="text"
                            id="clientes"
                            class="w-[405px]"
                            onchange="autocompletarInputs()"
                        >
                    
                            <option class="font-bold" disabled selected>Seleccionar cliente</option>
        
                            @foreach ($clientes as $cliente)
                                <option
                                    name="facturable_id"
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
                </div>
        
                <div class="flex flex-col gap-1 w-[215px]">
                    <label for="dni_nif" class="w-full">DNI/NIF</label>
                    <p id="dni_nif" class="h-[42px] p-2 w-full border-solid border border-black/50"></p>
                </div>
        
                <div class="flex flex-col w-[315px] gap-1">
                    <label for="razon_social" class="w-full">Razón Social</label>
                    <p id="razon_social" class="h-[42px] w-full p-2 border-solid border border-black/50"></p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[215px]">
                    <label for="serie" class="w-full">Cod. Ref. Factura</label>
                    <input
                        name="serie"
                        type="text"
                        id="serie"
                        class="w-full"
                        value="{{ date("Y") }}/{{ $nextId }}"
                        readonly
                    />
                </div>
    
                <div class="flex flex-col gap-1 w-[416px]">
                    <label class="w-full">Dirección</label>
                    <p id="domicilio" class="h-[42px] w-full p-2 border-solid border border-black/50"></p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[281px]">
                    <label>Población</label>
                    <p id="poblacion" class="h-[42px] p-2 border-solid border border-black/50 w-full"></p>
                </div>
    
                <div class="flex flex-col gap-1 w-[278px]">
                    <label>Provincia</label>
                    <p id="provincia" class="h-[42px] p-2 border-solid border border-black/50 w-full"></p>
                </div>
    
                <div class="flex flex-col gap-1 w-[176px]">
                    <label>Cod. Postal</label>
                    <p id="cod_postal" class="h-[42px] w-full p-2 border-solid border border-black/50"></p>
                </div>
    
                <div class="flex flex-col gap-1">
                    <label for="porcentaje_descuento" class="w-full">Descuento (%)</label>
                    <input type="text" id="porcentaje_descuento" name="porcentaje_descuento" class="calcularSubtotal w-full">
                </div>
                
                <div class="flex flex-col gap-1 w-[278px]">
                    <label for="estado" class="w-full">Estado</label>

                    <select name="estado" id="estado">
                        <option value="borrador" selected>Borrador</option>
                        <option value="emitida">Emitida</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="cancelada">Cancelada</option>
                        <option value="pagada">Pagada</option>
                    </select>
                </div>
            </div>

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 my-6 text-lg font-bold uppercase text-black/70">Datos empleado</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[456px]">
                    <label class="w-full">Empleado:</label>
                    <div class="w-full flex gap-1">
                        <p id="id_empleado" class="h-[42px] w-[45px] p-2 border-solid border border-black/50">{{ Auth::user()->empleado?->id }}</p>
        
                        <select
                            name="id_empleado"
                            type="text"
                            id="empleados"
                            class="w-[405px]"
                            onchange="autocompletarDatosEmpleados()"
                        >
                    
                            <option class="font-bold" disabled>Seleccionar empleado</option>

                            @foreach ($empleados as $empleado)
                                <option
                                    value="{{$empleado->id}}"
                                    {{-- Esto obtendrá un JSON por lo que TIENE que ir con comillas simples de lo contrario se creará una mala estructura en el JSON --}}
                                    data-info='@json($empleado)'
                                    {{ Auth::user()->empleado?->id === $empleado->id ? 'selected' : '' }}
                                    readonly
                                >
                                    {{ $empleado->nombre_completo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="dni_nif_empleado" class="w-full">DNI/NIF</label>
                    <p id="dni_nif_empleado" class="h-[42px] w-[215px] p-2 border-solid border border-black/50">{{ Auth::user()->empleado?->dni_nif }}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="cargo_empleado" class="w-full">Cargo</label>
                    <p id="cargo_empleado" class="h-[42px] w-[516px] p-2 border-solid border border-black/50">{{ Auth::user()->empleado?->cargo }}</p>
                </div>
            </div>
        </div>

        <div class="w-full border-y-solid border-y-2 border-y-indigo-600/25 flex flex-row gap-1 justify-between items-center font-bold py-2 px-4">

            <p class="w-[50px]">#</p>
            <p class="w-[295px]">Producto</p>
            <p class="w-[175px]">Código</p>
            <p class="w-[75px]">Cant.</p>
            <p class="w-[75px]">IVA</p>
            <p class="w-[75px]">Precio (€)</p>
            <p class="w-[75px]">Dto. (€)</p>
            <p class="w-[95px]">Subtotal</p>
        </div>

        <div id="detalles">
            <div class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">
                <input
                    type="number"
                    name="num_linea[]"
                    id="num_linea"
                    class="border-none p-0 w-[50px]"
                    value="1"
                />

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

                        $disponibilidad = $stock === 'Sin stock' ? 'disabled' : '';
                    @endphp

                        <option
                            value="{{ $producto->id}}"
                            data-info='@json($producto)'
                            {{ $disponibilidad }}
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
                    placeholder="Descuento"
                    class="descuento calcularSubtotal w-[75px] border-none p-0"
                    readonly
                />
                
                <input
                    type="text"
                    name="subtotal[]"
                    placeholder="Subtotal"
                    class="subtotal w-[95px] border-none p-0"
                    readonly
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
                    readonly
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
                    readonly
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
                    readonly
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
                    readonly
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

        // Al hacer lo anterior el script factura.js recibe y procesa los productos para mostrarlos
        
    </script>

    <script src="{{ asset('js/factura.js') }}" defer></script>
@endsection