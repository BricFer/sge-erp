@section('title', 'ERP | Cliente')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('cliente.home')])

        @include('layouts.clientes.buscar')
    </div>
    <div class="text-sm/7 w-full flex flex-col items-center">

        <div>
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $cliente -> nombre }} {{ $cliente -> apellido }}</h2>
        
            <p>
                <span class="font-bold">NIF:</span> {{ $cliente-> nif}}
            </p>
        
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

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                    <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <form
                    method="POST"
                    action="{{ route('cliente.destroy', $cliente->id) }}"
                >
                    @csrf
                    @method('DELETE')
                    <input
                        type="submit"
                        class="w-[24px] h-[24px] bg-[url('../../../../public/assets/icons/trash-icon.svg')] bg-no-repeat bg-cover bg-center text-transparent font-bold rounded-lg cursor-pointer border-none"
                    />
                </form>
            </div>

            <a
                href="{{ route('cliente.grid') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>

@endsection