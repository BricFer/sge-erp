@section('title', 'ERP | Crear cliente')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('cliente.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.home'),
            'gridUrl' => route('cliente.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('cliente.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="nombre">Nombre(s):</label>
            <input name="nombre" type="text" class="form-control" id="nombre">
        </div>

        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label>Apellido(s):</label>
            <input name="apellido" type="text">
        </div>

        <div class="flex flex-col gap-1">
            <label>NIF</label>
            <input name="nif" type="text">
        </div>

        <div class="flex flex-col gap-1 xl:w-2/3">
            <label>Domicilio:</label>
            <input name="domicilio" type="text">
        </div>

        <div class="flex flex-col gap-1">
            <label>Codigo postal</label>
            <input name="cod_postal" type="text">
        </div>

        <div class="flex flex-col gap-1 xl:w-1/3">
            <label>Poblacion</label>
            <input name="poblacion" type="text">
        </div>

        <div class="flex flex-col gap-1 xl:w-1/3">
            <label>Provincia</label>
            <input name="provincia" type="text">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label>Teléfono</label>
            <input name="telefono" type="tel">
        </div>

        <div class="flex flex-col gap-1 w-full">
            <label>Correo</label>
            <input name="correo" type="email">
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Crear"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />

            <a
                href="{{ route('cliente.home') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancel
            </a>

        </div>
    </form>
@endsection