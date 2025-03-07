@section('title', 'ERP | Proveedor')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('proveedor.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.home'),
            'gridUrl' => route('proveedor.grid')])
    </div>

    <div class="text-sm/7 w-full flex flex-col items-center">

        <div>
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $proveedor -> nombre }}</h2>
        
            <p>
                <span class="font-bold">CIF:</span> {{ $proveedor-> cif}}
            </p>
        
            <p>
                <span class="font-bold">Dirección:</span> {{ $proveedor-> domicilio}}
            </p>
        
            <p>
                <span class="font-bold">Código postal:</span> {{ $proveedor-> cod_postal}}
            </p>
        
            <p>
                <span class="font-bold">Población:</span> {{ $proveedor-> poblacion}}
            </p>
        
            <p>
                <span class="font-bold">Provincia:</span> {{ $proveedor-> provincia}}
            </p>
        
            <p>
                <span class="font-bold">Teléfono:</span> {{ $proveedor-> telefono}}
            </p>
        
            <p>
                <span class="font-bold">Correo:</span> {{ $proveedor-> correo}}
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <form
                    method="POST"
                    action="{{ route('proveedor.destroy', $proveedor->id) }}"
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
                href="{{ route('proveedor.grid') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>

@endsection