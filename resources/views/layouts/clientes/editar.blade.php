@section('title', 'ERP | Editar cliente')

@extends('home')

@section('content')
    <form
        method="POST"
        action="{{ route('cliente.update', $cliente->id) }}"
        class="flex flex-col px-2 w-full gap-6 lg:flex-row lg:flex-wrap lg:gap-1 lg:justify-between lg:max-w-7xl"
    >

    @method('PUT')
    @csrf
    <div class="flex flex-col gap-1 lg:w-[628px]">
        <label for="nombre">Nombre(s):</label>
        <input
            name="nombre"
            value="{{ $cliente->nombre }}"
            type="text"
            id="nombre"
            readonly
        />
    </div>

    <div class="flex flex-col gap-1 lg:w-[628px]">
        <label>Apellido(s):</label>
        <input
            name="apellido"
            value="{{ $cliente->apellido }}"
            type="text"
            id="apellido"
            readonly
        />
    </div>

    <div class="flex flex-col gap-1">
        <label>NIF</label>
        <input
            name="nif"
            value="{{ $cliente->nif }}"
            type="text"
            id="nif"
            readonly
        />
    </div>

    <div class="flex flex-col gap-1 lg:w-2/3">
        <label>Domicilio:</label>
        <input
            name="domicilio"
            value="{{ $cliente->domicilio }}"
            type="text"
            id="domicilio"
        />
    </div>

    <div class="flex flex-col gap-1">
        <label>Codigo postal</label>
        <input
            name="cod_postal"
            value="{{ $cliente->cod_postal }}"
            type="text"
            id="cod_postal"
        />
    </div>

    <div class="flex flex-col gap-1 lg:w-1/3">
        <label>Poblacion</label>
        <input
            name="poblacion"
            value="{{ $cliente->poblacion }}"
            type="text"
            id="poblacion"
        />
    </div>

    <div class="flex flex-col gap-1 lg:w-1/3">
        <label>Provincia</label>
        <input
            name="provincia"
            value="{{ $cliente->provincia }}"
            type="text"
            id="provincia"
        />
    </div>

    <div class="flex flex-col gap-1 lg:w-[412px]">
        <label>Teléfono</label>
        <input
            name="telefono"
            value="{{ $cliente->telefono }}"
            type="tel"
            id="telefono"
        />
    </div>

    <div class="flex flex-col gap-1 w-full">
        <label>Correo</label>
        <input
            name="correo"
            value="{{ $cliente->correo }}"
            type="email"
            id="correo"
        />
    </div>

    <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
        <a
            href="{{ route('cliente.home') }}"
            class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        >
            Cancelar
        </a>

        <input
            type="submit"
            value="Editar"
            class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        />
    </div>

    </form>
@endsection