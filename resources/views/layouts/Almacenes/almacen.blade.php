@section('title', 'ERP | Almacen')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>
    
    <div class="text-sm/7 w-full flex flex-col items-center">

        <div>
            <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $almacen -> nombre }}</h2>
        
            <p>
                <span class="font-bold">Ubicación:</span> {{ $almacen-> ubicacion}}
            </p>

            <div class="flex flex-row gap-2 mt-4">

                <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </a>
    
                <img
                    data-action="{{ route('almacen.destroy', $almacen->id) }}"
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    alt="delete icon"
                    class="warning-img w-[24px] h-[24px] rounded-lg cursor-pointer"
                >
            </div>

            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 mt-8 text-white rounded-lg w-36"
            >
                Regresar
            </a>
        </div>
    </div>
@endsection