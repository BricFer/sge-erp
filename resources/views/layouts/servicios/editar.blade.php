@section('title', 'ERP | Editar servicio')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('servicio.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('servicio.crear'),
            'listUrl' => route('servicio.home'),
            'gridUrl' => route('servicio.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('servicio.update', $servicio->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label for="nombre">Nombre:</label>
            <input
                name="nombre"
                value="{{ $servicio->nombre }}"
                type="text"
                id="nombre"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label>Descripción:</label>
            <input
                name="descripcion"
                value="{{ $servicio->descripcion }}"
                type="text"
                id="descripcion"
            />
        </div>

        <div class="flex flex-col gap-1">
            <label>precio</label>
            <input
                name="precio"
                value="{{ $servicio->precio }}"
                type="text"
                id="precio"
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-2/3">
            <label>Domicilio:</label>
            <input
                name="domicilio"
                value="{{ $servicio->domicilio }}"
                type="text"
                id="domicilio"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-2/3">
            <label for="tipo_servicio">Tipo de servicio:</label>

            <select name="tipo_servicio" id="tipo_servicio">
                <option selected disabled>Selecciona una opcion</option>
                <option
                    value="mantenimiento"
                    {{ $servicio->tipo_servicio == 'mantenimiento' ? 'selected' : '' }} 
                    >
                    Mantenimiento
                </option>
                <option
                    value="asesoria"
                    {{ $servicio->tipo_servicio == 'asesoria' ? 'selected' : '' }} 
                    >
                    Asesoria
                </option>
                <option
                    value="reparacion"
                    {{ $servicio->tipo_servicio == 'reparacion' ? 'selected' : '' }} 
                    >
                    Reparacion
                </option>
                <option
                    value="instalacion"
                    {{ $servicio->tipo_servicio == 'instalacion' ? 'selected' : '' }} 
                    >
                    Instalacion
                </option>
            </select>
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