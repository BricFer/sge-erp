@section('title', 'ERP | Crear empleado')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('empleado.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="nombre">Nombre completo:</label>
            <input name="nombre" type="text" class="form-control" id="nombre">
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="dni_nif">DNI/NIF:</label>
            <input name="dni_nif" type="text" class="form-control" id="dni_nif">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label>Teléfono:</label>
            <input name="telefono" type="tel">
        </div>

        <div class="flex flex-col gap-1 w-[845px]">
            <label>Correo</label>
            <input name="correo" type="email">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="cargo">Cargo del empleado:</label>
            <input name="cargo" type="text" id="cargo">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="fecha_contratacion">Fecha de alta:</label>
            <input name="fecha_contratacion" type="date" id="fecha_contratacion">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="estado">Estado del empleado:</label>
            <input name="estado" type="text" id="estado">
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