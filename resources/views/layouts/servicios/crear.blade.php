@section('title', 'ERP | Crear servicio')

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
        action="{{ route('servicio.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="nombre">Nombre:</label>
            <input name="nombre" type="text" class="form-control" id="nombre">
        </div>

        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="descripcion">Descripcion:</label>
            <input name="descripcion" type="text" id="descripcion">
        </div>

        <div class="flex flex-col gap-1">
            <label for="precio">Precio:</label>
            <input name="precio" type="text" id="precio">
        </div>

        <div class="flex flex-col gap-1 xl:w-2/3">
            <label for="tipo_servicio">Tipo de servicio:</label>
            <select name="tipo_servicio" id="tipo_servicio">
                <option selected disabled>Selecciona una opcion</option>
                <option value="mantenimiento">Mantenimiento</option>
                <option value="asesoria">Asesoria</option>
                <option value="reparacion">Reparacion</option>
                <option value="instalacion">Instalacion</option>
            </select>
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Crear"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />

            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancel
            </a>

        </div>
    </form>
@endsection