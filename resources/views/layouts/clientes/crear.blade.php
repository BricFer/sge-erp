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
        </div>

        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label>Razón social</label>
            <input name="razon_social" type="text" id="razon_social">
        </div>

        <div class="flex flex-col gap-1">
            <label>NIF</label>
            <input name="nif" type="text">
        </div>

        <div class="flex flex-col gap-1 xl:w-2/3">
            <label>Domicilio</label>
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

        @include('layouts._partials.submit-cancel')
    </form>
@endsection