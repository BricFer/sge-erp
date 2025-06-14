@section('title', 'ERP | Crear factura')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        {{-- TODO: Asignar backUrl dependiendo de si es cliente o no --}}
        @include('layouts._partials.nav-bar', ['backUrl' => route('factura.compras')])
    </div>

    <form
        id="factura-form"
        method="POST"
        action="{{ route('factura.store') }}"
        class="flex flex-col w-full gap-6 border-solid border-2 border-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/50 xl:max-w-7xl xl:m-auto bg-transparent"
    >
        @csrf
        <div class="w-full p-6">

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 mb-4 text-lg font-bold uppercase">factura</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[205px] ">
                    <span class="w-full">Factura tipo: </span>
                    <p class="h-[42px] p-2 w-full dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        {{ $isClient ? 'Venta' : 'Compra'}}
                    </p>
                    <input
                        name="facturable_type"
                        type="text"
                        class="hidden"
                        value="{{ $isClient ? 'App\Models\Cliente' : 'App\Models\Proveedor' }}"
                        readonly
                    />
                </div>

                <div class="flex flex-col gap-1 w-[456px]">
                    <label for="{{ $isClient ? 'clientes' : 'proveedores' }}" class="w-full">ID | Nombre:</label>
                    <div class="w-full flex gap-1">
                        <p id="{{ $isClient ? 'id_proveedor' : 'id_cliente'}}" class="h-[42px] w-[45px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
        
                        <select
                            name="facturable_id"
                            type="text"
                            id="{{ $isClient ? 'clientes' : 'proveedores'}}"
                            class="w-[405px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            onchange="autocompletarInputs(this)"
                        >
                    
                            <option class="font-bold bg-transparent" disabled selected>Seleccionar {{ $isClient ? 'cliente' : 'proveedor'}}</option>
        
                            @foreach ($socios as $socio)
                                <option
                                    class="text-black"
                                    name="facturable_id"
                                    value="{{$socio->id}}"
                                    readonly
                                    {{-- Esto obtendrá un JSON por lo que TIENE que ir con comillas simples de lo contrario se creará una mala estructura en el JSON --}}
                                    data-info='@json($socio)'
                                >
                                    {{ $socio->nombre_completo }}
                                </option>
                            @endforeach
            
                        </select>
                    </div>
                </div>
        
                <div class="flex flex-col gap-1 w-[215px]">
                    <span for="cif" class="w-full">{{ $isClient ? 'DNI/NIF' : 'CIF'}}</span>
                    <p id="cif" class="h-[42px] p-2 w-full dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
        
                <div class="flex flex-col w-[315px] gap-1">
                    <span for="razon_social" class="w-full">Razón Social</span>
                    <p id="razon_social" class="h-[42px] w-full p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[215px]">
                    <label for="serie" class="w-full">Cod. Ref. Factura</label>
                    <input
                        name="serie"
                        type="text"
                        id="serie"
                        class="w-full bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        value="{{ date("Y") }}/{{ $nextId }}"
                    />
                </div>
    
                <div class="flex flex-col gap-1 w-[416px]">
                    <span class="w-full">Dirección</span>
                    <p id="domicilio" class="h-[39px] w-full p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
                                        
                <div class="flex flex-col gap-1 w-[281px]">
                    <span>Población</span>
                    <p id="poblacion" class="h-[39px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
    
                <div class="flex flex-col gap-1 w-[278px]">
                    <span>Provincia</span>
                    <p id="provincia" class="h-[39px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
    
                <div class="flex flex-col gap-1 w-[176px]">
                    <span>Cod. Postal</span>
                    <p id="cod_postal" class="h-[42px] w-full p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"></p>
                </div>
    
                <div class="flex flex-col gap-1">
                    <label for="porcentaje_descuento" class="w-full">Descuento (%)</label>
                    <input type="text" id="porcentaje_descuento" name="porcentaje_descuento" class="calcularSubtotal w-full h-[42px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="plazo_pago" class="w-full">Plazo de pago (días)</label>
                    <input type="text" id="plazo_pago" name="plazo_pago" class="calcularSubtotal w-full h-[42px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal" value="30">
                </div>
                
                <div class="flex flex-col gap-1 w-[278px]">
                    <label for="estado" class="w-full">Estado</label>

                    <select name="estado" id="estado" class="bg-transparent h-[42px] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        <option class="text-black" value="borrador" selected>Borrador</option>
                        <option class="text-black" value="emitida">Emitida</option>
                        <option class="text-black" value="pendiente">Pendiente</option>
                        <option class="text-black" value="cancelada">Cancelada</option>
                        <option class="text-black" value="pagada">Pagada</option>
                    </select>
                </div>
                
                <div class="flex flex-col gap-1 w-[278px]">
                    <label for="almacenes" class="w-full">Almacén</label>

                    <select
                        name="id_almacen"
                        id="almacenes"
                        onchange="completarProductos()"
                        class="bg-transparent h-[42px] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        <option class="text-black" selected disabled>Selecciona almacen</option>
                        
                        @foreach ($almacenes as $almacen)

                            @if($almacen->estado === 'activo' )
                                <option
                                    class="text-black"
                                    value="{{ $almacen->id }}"
                                    data-info='@json($almacen)'
                                >
                                    {{ $almacen->nombre }}
                                </option>
                            @endif
                            
                        @endforeach

                    </select>
                </div>
            </div>

            <h2 class="border-b-solid border-b-2 border-b-indigo-600/30 my-6 text-lg font-bold uppercase">Datos empleado</h2>

            <div class="w-full flex flex-wrap gap-1 justify-content">
                <div class="flex flex-col gap-1 w-[456px]">
                    <span class="w-full">Empleado:</span>
                    <div class="w-full flex gap-1">
                        <p id="id_empleado" class="h-[42px] w-[195px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">{{ Auth::user()->empleado?->legajo }}</p>
        
                        <select
                            name="id_empleado"
                            type="text"
                            id="empleados"
                            class="w-[365px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            onchange="autocompletarDatosEmpleados(this)"
                            {{ in_array(( Auth::user()->empleado?->cargo ), $managers) || Auth::user()->isAdmin ? '' : 'readonly' }}
                        >
                    
                            <option value="" class="font-bold text-black bg-transparent" disabled>Seleccionar empleado</option>

                            @foreach ($empleados as $empleado)
                                <option
                                    class="bg-transparent text-black"
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
                    <span class="w-full">DNI/NIF</span>
                    <p id="dni_nif_empleado" class="h-[42px] w-[215px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">{{ Auth::user()->empleado?->dni_nif }}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <span for="cargo_empleado" class="w-full">Cargo</span>
                    <p id="cargo_empleado" class="h-[42px] w-[516px] p-2 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">{{ Auth::user()->empleado?->cargo }}</p>
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
            <p class="w-[95px]">Subtotal (€)</p>
            <img id="agregar-detalle" src="{{ asset('assets/icons/plus-icon.svg') }}" class="w-[24px] cursor-pointer"/>
        </div>

        <div id="detalles">
            <div id="detalle-row-1" class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">

                <input
                    type="text"
                    name="num_linea[]"
                    class="border-none p-0 w-[50px] bg-transparent"
                    value="1"
                />

                <select
                    name="id_producto[]"
                    onchange="completarDetalleFactura(this)"
                    class="productos w-[295px] border-none p-0 bg-transparent"
                >
                    <option
                        disabled
                        selected
                        class="bg-transparent"
                    >
                        Lista productos
                    </option>

                </select>
    
                <input
                    type="text"
                    placeholder="Código producto"
                    class="codigo w-[175px] border-none p-0 bg-transparent"
                    readonly
                />
    
                <input
                    type="number"
                    name="cantidad[]"
                    placeholder="Cant."
                    min="1"
                    max="99"
                    class="cantidad calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                />
                
                <input
                    type="number"
                    name="iva[]"
                    placeholder="%IVA"
                    min="0"
                    max="99"
                    class="iva calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                />
    
                <input
                    type="text"
                    placeholder="P.U"
                    name="precio[]"
                    class="precio calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                />
    
                <input
                    type="text"
                    name="descuento[]"
                    placeholder="Descuento"
                    class="descuento calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                    readonly
                />
                
                <input
                    type="text"
                    name="subtotal[]"
                    placeholder="Subtotal"
                    class="subtotal w-[95px] border-none p-0 bg-transparent"
                    readonly
                />

                <img
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    class="eliminar-detalle w-[24px] h-[24px] rounded-lg cursor-pointer"
                    onclick="eliminarRow(this)"
                >
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
                    class="w-[215px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
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
                    class="w-[215px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
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
                    class="w-[215px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
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
                    class="w-[215px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    readonly
                />
            </div>

        </div>

        <div class="pl-4">
            @include('layouts._partials.submit-cancel')
        </div>
    </form>

    <script src="{{ asset('js/facturas.js') }}" defer></script>
@endsection