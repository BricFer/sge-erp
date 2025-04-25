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
            <input
                name="legajo"
                type="hidden"
                id="legajo"
                value="{{ date("Y") }}{{ $nextId }}"
                readonly
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="dni_nif">Documento Nacional:</label>
            <input name="dni_nif" type="text" class="form-control" id="dni_nif">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="telefono">Teléfono</label>
            <input name="telefono" type="tel" id="telefono">
        </div>

        <div class="flex flex-col gap-1 w-[845px]">
            <label for="correo">Correo</label>
            <input id="correo" name="correo" type="email">
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="cargo">Cargo del empleado:</label>
            <input name="cargo" type="text" id="cargo">
        </div>

        <div class="flex flex-col gap-1 xl:mr-auto xl:w-[412px]">
            <label for="fecha_contratacion">Fecha de alta:</label>
            <input name="fecha_contratacion" type="date" id="fecha_contratacion" class="uppercase">
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection