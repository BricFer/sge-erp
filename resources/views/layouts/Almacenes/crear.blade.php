@section('title', 'ERP | Crear almacen')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts.almacenes.buscar')
    </div>
    <form
        method="POST"
        action="{{ route('almacen.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
    @csrf
    <div class="flex flex-col gap-1 w-full">
        <label for="nombre">Nombre/Alias:</label>
        <input name="nombre" type="text" class="form-control" id="nombre">
    </div>
    
    @error('nombre')
        <span style="color:red">{{$message}}</span>
    @enderror

    <div class="flex flex-col gap-1 w-full">
        <label>Ubicación:</label>
        <input name="ubicacion" type="text">
    </div>

    @error('cif')
        <span style="color:red">{{$message}}</span>
    @enderror

    <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
        <a
            href="{{ route('almacen.home') }}"
            class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        >
            Cancel
        </a>

        <input
            type="submit"
            value="Crear"
            class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
        />
    </div>

    </form>
@endsection