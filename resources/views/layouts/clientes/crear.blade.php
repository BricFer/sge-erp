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
            <label for="nombre_completo">Nombre del cliente</label>
            <input name="nombre_completo" type="text" id="nombre_completo">
            <input name="cod_cliente" type="hidden" id="cod_cliente" value="CLI-{{ date("Y") }}{{ $nextId }}">
        </div>

        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="razon_social">Razón social</label>
            <input name="razon_social" type="text" id="razon_social">
        </div>

        <div class="flex flex-col gap-1">
            <label for="nif">NIF</label>
            <input name="nif" type="text" id="nif">
        </div>

        <div class="flex flex-col gap-1 xl:w-2/3">
            <label for="domicilio">Domicilio</label>
            <input name="domicilio" type="text" id="domicilio">
        </div>

        <div class="flex flex-col gap-1">
            <label for="cod_postal">Codigo postal</label>
            <input name="cod_postal" type="text" id="cod_postal">
        </div>

        <div class="flex flex-col gap-1 xl:w-1/3">
            <label for="poblacion">Poblacion</label>
            <input name="poblacion" type="text" id="poblacion">
        </div>

        <div class="flex flex-col gap-1 xl:w-1/3">
            <label for="provincia">Provincia</label>
            <input name="provincia" type="text" id="provincia">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="telefono">Teléfono</label>
            <input name="telefono" type="tel" id="telefono">
        </div>

        <div class="flex flex-col gap-1 w-full">
            <label for="correo">Correo</label>
            <input name="correo" type="email" id="correo">
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection