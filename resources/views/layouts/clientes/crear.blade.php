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
        <div class="flex flex-col gap-1 lg:w-[428px]">
            <label for="nombre_completo">Nombre del cliente</label>
            <input
                name="nombre_completo"
                type="text"
                id="nombre_completo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
            <input name="cod_cliente" type="hidden" id="cod_cliente" value="CLI-{{ date("Y") }}{{ $nextId }}">
        </div>

        <div class="flex flex-col gap-1 lg:w-[428px]">
            <label for="razon_social">Razón social</label>
            <input
                name="razon_social"
                type="text"
                id="razon_social"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[398px]">
            <label for="nif">NIF</label>
            <input
                name="nif"
                type="text"
                id="nif"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[475px]">
            <label for="domicilio">Domicilio</label>
            <input
                name="domicilio"
                type="text"
                id="domicilio"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[146px]">
            <label for="cod_postal">Codigo postal</label>
            <input
                name="cod_postal"
                type="text"
                id="cod_postal"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[306px]">
            <label for="poblacion">Poblacion</label>
            <input
                name="poblacion"
                type="text"
                id="poblacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[316px]">
            <label for="provincia">Provincia</label>
            <input
                name="provincia"
                type="text"
                id="poblacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[296px]">
            <label for="telefono">Teléfono</label>
            <input
                name="telefono"
                type="tel"
                id="telefono"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[956px]">
            <label for="correo">Correo</label>
            <input
                name="correo"
                type="email"
                id="correo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection