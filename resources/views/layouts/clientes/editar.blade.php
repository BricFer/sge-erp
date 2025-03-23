@section('title', 'ERP | Editar cliente')

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
        action="{{ route('cliente.update', $cliente->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label for="nombre_completo">Nombre del cliente</label>
            <input
                name="nombre_completo"
                value="{{ $cliente->nombre_completo }}"
                type="text"
                id="nombre_completo"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label>Razon social</label>
            <input
                name="razon_social"
                value="{{ $cliente->razon_social }}"
                type="text"
                id="razon_social"
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

        @include('layouts._partials.submit-cancel')
    </form>
@endsection