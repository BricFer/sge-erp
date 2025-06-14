@section('title', 'ERP | Crear proveedor')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('proveedor.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.lista'),
            'gridUrl' => route('proveedor.home')])
    </div>

    <form
        method="POST"
        action="{{ route('proveedor.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[728px]">
            <label for="nombre_completo">Nombre proveedor:</label>
            <input
                name="nombre_completo"
                type="text"
                id="nombre_completo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('nombre_completo', '')}}"
            />
            <input name="cod_proveedor" type="hidden" id="cod_proveedor" value="SUP-{{ date("Y") }}{{ $nextId }}">
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[532px]">
            <label for="razon_social">Razón Social:</label>
            <input
                name="razon_social"
                type="text"
                id="razon_social"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('razon_social', '')}}"
            />
        </div>
        
        <div class="flex flex-col gap-1 w-[432px]">
            <label for="cif">CIF</label>
            <input
                name="cif"
                type="text"
                id="cif"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('cif', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[828px]">
            <label for="domicilio">Domicilio:</label>
            <input
                name="domicilio"
                type="text"
                id="domicilio"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('domicilio', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[385px]">
            <label for="cod_postal">Codigo postal</label>
            <input
                name="cod_postal"
                type="text"
                id="cod_postal"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('cod_postal', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[434px]">
            <label for="poblacion">Poblacion</label>
            <input
                name="poblacion"
                type="text"
                id="poblacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('poblacion', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[434px]">
            <label for="provincia">Provincia</label>
            <input
                name="provincia"
                type="text"
                id="poblacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('provincia', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="telefono">Teléfono</label>
            <input
                name="telefono"
                type="tel"
                id="telefono"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('telefono', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 w-[845px]">
            <label for="correo">Correo</label>
            <input
                name="correo"
                type="email"
                id="correo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('correo', '')}}"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection