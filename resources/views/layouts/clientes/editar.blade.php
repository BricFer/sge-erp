@section('title', 'ERP | Editar cliente')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('cliente.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.lista'),
            'gridUrl' => route('cliente.home')])
    </div>

    <form
        method="POST"
        action="{{ route('cliente.update', $cliente->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-[428px]">
            <label for="nombre_completo">Nombre del cliente</label>
            <input
                name="nombre_completo"
                value="{{ old('nombre_completo', $cliente->nombre_completo) }}"
                type="text"
                id="nombre_completo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        <input
            type="hidden"
            name="cod_cliente"
            id="cod_cliente"
            value="{{ $cliente->cod_cliente }}"
            readonly
        />
        
        <div class="flex flex-col gap-1 lg:w-[428px]">
            <label for="razon_social">Razón social</label>
            <input
                name="razon_social"
                value="{{ old('razon_social', $cliente->razon_social) }}"
                type="text"
                id="razon_social"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[398px]">
            <label for="nif">NIF</label>
            <input
                name="nif"
                value="{{ old('nif', $cliente->nif) }}"
                type="text"
                id="nif"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[475px]">
            <label for="domicilio">Domicilio</label>
            <input
                name="domicilio"
                value="{{ old('domicilio', $cliente->domicilio) }}"
                type="text"
                id="domicilio"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[146px]">
            <label for="cod_postal">Codigo postal</label>
            <input
                name="cod_postal"
                value="{{ old('cod_postal', $cliente->cod_postal) }}"
                type="text"
                id="cod_postal"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[306px]">
            <label for="poblacion">Poblacion</label>
            <input
                name="poblacion"
                value="{{ old('poblacion', $cliente->poblacion) }}"
                type="text"
                id="poblacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[316px]">
            <label for="provincia">Provincia</label>
            <input
                name="provincia"
                value=" {{ old('provincia', $cliente->provincia) }}"
                type="text"
                id="provincia"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[296px]">
            <label for="telefono">Teléfono</label>
            <input
                name="telefono"
                value="{{ old('telefono', $cliente->telefono) }}"
                type="tel"
                id="telefono"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[956px]">
            <label for="correo">Correo</label>
            <input
                name="correo"
                value="{{ old('correo', $cliente->correo) }}"
                type="email"
                id="correo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />

            {{-- El old() me ayuda a trabajar con el withInput(), declarado en el controlador, para que en caso de errores los campos se autocompleten con los valores introducidos por el usuario --}}
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection