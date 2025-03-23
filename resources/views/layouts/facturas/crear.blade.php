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
        
        <div class="w-full border-b-solid border-b-2 border-b-indigo-600/25 p-6">

            <div class="flex flex-col gap-1">
                <label for="nombre">Cliente:</label>
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
                            value="{{ $cliente->id }}"
                            readonly
                            {{-- Esto obtendrá un JSON por lo que TIENE que ir con comillas simples de lo contrario se creará una mala estructura en el JSON --}}
                            data-info='@json($cliente)'
                        >
                            {{ $cliente->nombre }} {{ $cliente->apellido }}
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

        </div>

        <div class="w-full border-b-solid border-b-2 border-b-indigo-600/25 flex flex-row justify-between items-center font-bold p-2">
            <p>Producto</p>
            <p>Código</p>
            <p>Descripción</p>
            <p>Cant.</p>
            <p>Precio</p>
            <p>%Dto.</p>
            <p>Subtotal</p>
        </div>

        <div>
            <input type="text">
        </div>

        <div class="flex flex-col w-full gap-4 p-6 md:flex-row">
            
            <input
                type="submit"
                value="Crear"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer hover:bg-teal-500 hover:border-teal-500 md:w-96"
            />

            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg hover:bg-teal-500 hover:border-teal-500 md:w-96"
            >
                Cancel
            </a>

        </div>
    </form>

    <script>
        const autocompletarInputs = () => {
            const selectList = document.getElementById("clientes");

            const clienteSeleccionado = selectList.options[selectList.selectedIndex];

            const clienteData = clienteSeleccionado.getAttribute("data-info");
            
            try {
                const cliente = JSON.parse(clienteData);

                console.log(cliente);

                document.getElementById("id_cliente").value = cliente.id || "";
                document.getElementById("dni_nif").value = cliente.nif || "";
                document.getElementById("razon_social").value = `${cliente.nombre} ${ cliente.apellido}` || "";
                document.getElementById("domicilio").value = cliente.domicilio || "";
                document.getElementById("poblacion").value = cliente.poblacion || "";
                document.getElementById("provincia").value = cliente.provincia || "";
                document.getElementById("cod_postal").value = cliente.cod_postal || "";

            } catch (error) {
                console.error("Error al parsear JSON:", error);
            }
        }
    </script>
@endsection