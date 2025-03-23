@section('title', 'ERP | Editar almacen')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('almacen.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>

    <form
        method="POST"
        action="{{ route('almacen.update', $almacen->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:gap-4 xl:flex-row xl:flex-wrap xl:justify-between xl:max-w-7xl xl:m-auto"
    >

        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 xl:w-[768px]">
            <label for="nombre">Nombre/Alias:</label>
            <input
                name="nombre"
                value="{{ $almacen->nombre }}"
                type="text"
                id="nombre"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label for="capacidad">Vol. del almacen:</label>
            <input
                name="capacidad"
                value="{{ $almacen->capacidad }}"
                type="text"
                id="capacidad"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label>Responsable del almacen:</label>
            <select
                name="id_empleado"
                value="{{ $almacen->id_empleado }}"
                type="text"
                id="id_empleado"
            >
            @foreach($empleados as $empleado)

                <option value="{{ $empleado->id }}" 
                    {{ $almacen->empleado_id == $empleado->id ? 'selected' : '' }}>
                    {{ $empleado-> nombre }} - {{ $empleado-> cargo}}
                </option>

            @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1 xl:w-[768px]">
            <label>Ubicación</label>
            <input
                name="ubicacion"
                value="{{ $almacen->ubicacion }}"
                type="text"
                id="ubicacion"
            />
        </div>

        <div class="flex flex-col gap-4">
            <p>Estado del almacen:</p>

            <label class="flex gap-2 items-center" for="inactivo">
                <input
                    type="radio"
                    name="estado"
                    id="inactivo"
                    value="inactivo"
                    {{ $almacen->estado == 'inactivo' ? 'checked' : '' }} >
                Inactivo
            </label>

            <label class="flex gap-2 items-center" for="activo">
                <input
                    type="radio"
                    name="estado"
                    id="activo"
                    value="activo"
                    {{ $almacen->estado == 'activo' ? 'checked' : '' }} >
                Activo
            </label>
            
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Editar"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96 hover:bg-teal-500 hover:border-teal-500"
            />
            
            <a
                href="{{ url()->previous() }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96 hover:bg-teal-500 hover:border-teal-500"
            >
                Cancelar
            </a>

        </div>
    </form>
@endsection