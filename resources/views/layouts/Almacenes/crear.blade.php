@section('title', 'ERP | Crear almacen')

@extends('dashboard')

@section('content')
    <div class="border-b-solid border-b-2 border-b-indigo-600/25 mb-16">
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])
    </div>

    <form
        method="POST"
        action="{{ route('almacen.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:gap-4 xl:flex-row xl:flex-wrap xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[768px]">
            <label for="nombre">Nombre/Alias:</label>
            <input name="nombre" type="text" id="nombre">
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label for="capacidad">Vol. del almacen:</label>
            <input name="capacidad" type="text" id="capacidad">
        </div>

        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label for="responsable_almacen">Responsable del almacen:</label>
            <select name="responsable_almacen" type="text"   id="responsable_almacen">
            
                <option class="font-bold" value="" disabled selected>Asignar responsable</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }} - {{ $empleado->cargo }}</option>
                @endforeach

            </select>
        </div>

        <div class="flex flex-col gap-1 xl:w-[768px]">
            <label>Ubicación:</label>
            <input name="ubicacion" type="text">
        </div>

        <div class="flex flex-col gap-4">
            <p>Estado del almacen:</p>

            <label class="flex gap-2 items-center" for="inactivo">
                <input type="radio" name="estado" id="inactivo" value="inactivo" checked>
                Inactivo
            </label>

            <label class="flex gap-2 items-center" for="activo">
                <input type="radio" name="estado" id="activo" value="activo">
                Activo
            </label>
            
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection