@section('title', 'ERP | Crear almacen')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('almacen.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:gap-4 xl:flex-row xl:flex-wrap xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[768px]">
            <label for="nombre">Nombre/Alias:</label>
            <input name="nombre" type="text" class="form-control" id="nombre">
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label for="capacidad">Capacidad de almacenamiento:</label>
            <input name="capacidad" type="text" class="form-control" id="capacidad">
        </div>

        <div class="flex flex-col gap-1 w-full">
            <label>Ubicación:</label>
            <input name="ubicacion" type="text">
        </div>

        <div class="flex flex-col gap-4">
            <p>Estado del almacen:</p>

            <label class="flex gap-2 items-center" for="inactivo">
                <input type="radio" name="estado" id="inactivo" value="inactivo" checked>
                Inactivo
            </label>

            <label class="flex gap-2 items-center" for="activo">
                <input type="radio" name="estado" id="activo" value="activo">
                Activo
            </label>
            
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Crear"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />
            
            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancel
            </a>

        </div>
    </form>
@endsection