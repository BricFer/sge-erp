@section('title', 'ERP | Editar proveedor')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('proveedor.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.home'),
            'gridUrl' => route('proveedor.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('proveedor.update', $proveedor->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 xl:w-[728px]">
            <label for="nombre">Nombre proveedor:</label>
            <input
                name="nombre"
                value="{{ $proveedor->nombre }}"
                type="text"
                id="nombre"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 w-[532px]">
            <label>CIF</label>
            <input
                name="cif"
                value="{{ $proveedor->cif }}"
                type="text"
                id="cif"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[828px]">
            <label>Domicilio:</label>
            <input
                name="domicilio"
                value="{{ $proveedor->domicilio }}"
                type="text"
                id="domicilio"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[432px]">
            <label>Codigo postal</label>
            <input
                name="cod_postal"
                value="{{ $proveedor->cod_postal }}"
                type="text"
                id="cod_postal"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-1/3">
            <label>Poblacion</label>
            <input
                name="poblacion"
                value="{{ $proveedor->poblacion }}"
                type="text"
                id="poblacion"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-1/3">
            <label>Provincia</label>
            <input
                name="provincia"
                value="{{ $proveedor->provincia }}"
                type="text"
                id="provincia"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[412px]">
            <label>Teléfono</label>
            <input
                name="telefono"
                value="{{ $proveedor->telefono }}"
                type="tel"
                id="telefono"
            />
        </div>

        <div class="flex flex-col gap-1 w-full">
            <label>Correo</label>
            <input
                name="correo"
                value="{{ $proveedor->correo }}"
                type="email"
                id="correo"
            />
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">

            <input
                type="submit"
                value="Editar"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />
            
            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancelar
            </a>

        </div>
    </form>
@endsection