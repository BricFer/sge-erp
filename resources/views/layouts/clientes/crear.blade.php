@section('title', 'ERP | Crear cliente')

@extends('home')

@section('content')
    <form
        method="POST"
        action="{{ route('cliente.store') }}"
        class="flex flex-col px-2 w-full gap-6 lg:flex-row lg:flex-wrap lg:gap-1 lg:justify-between lg:max-w-7xl"
    >
    @csrf
    <div class="flex flex-col gap-1 lg:w-[628px]">
        <label for="nombre">Nombre(s):</label>
        <input name="nombre" type="text" class="form-control" id="nombre">
    </div>
    
    @error('nombre')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 lg:w-[628px]">
        <label>Apellido(s):</label>
        <input name="apellido" type="text">
    </div>
    
    @error('apellido')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1">
        <label>NIF</label>
        <input name="nif" type="text">
    </div>

    @error('nif')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 lg:w-2/3">
        <label>Domicilio:</label>
        <input name="domicilio" type="text">
    </div>

    @error('domicilio')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1">
        <label>Codigo postal</label>
        <input name="cod_postal" type="text">
    </div>

    @error('codigo postal')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 lg:w-1/3">
        <label>Poblacion</label>
        <input name="poblacion" type="text">
    </div>

    @error('poblacion')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 lg:w-1/3">
        <label>Provincia</label>
        <input name="provincia" type="text">
    </div>

    @error('provincia')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 lg:w-[412px]">
        <label>Teléfono</label>
        <input name="telefono" type="tel">
    </div>

    <div class="flex flex-col gap-1 w-full">
        <label>Correo</label>
        <input name="correo" type="email">
    </div>

    @error('correo')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
        <a
            href="{{ route('cliente.home') }}"
            class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        >
            Cancel
        </a>

        <input
            type="submit"
            value="Crear"
            class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        />
    </div>

    </form>
@endsection