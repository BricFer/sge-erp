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
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label for="capacidad">Vol. del almacen:</label>
            <input
                name="capacidad"
                value="{{ $almacen->capacidad }}"
                type="text"
                id="capacidad"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[475px]">
            <label>Responsable del almacen:</label>
            <select
                name="id_empleado"
                value="{{ $almacen->id_empleado }}"
                type="text"
                id="id_empleado"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            >
            @foreach($empleados as $empleado)

                <option
                    class="text-black"
                    name="id_empleado"
                    value="{{ $empleado->id }}"
                    {{ $almacen->empleado_id == $empleado->id ? 'selected' : '' }}
                >
                    {{ $empleado-> nombre_completo }} - {{ $empleado-> cargo}}
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
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
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
                    {{ $almacen->estado == 'inactivo' ? 'checked' : '' }}
                />
                Inactivo
            </label>

            <label class="flex gap-2 items-center" for="activo">
                <input
                    type="radio"
                    name="estado"
                    id="activo"
                    value="activo"
                    {{ $almacen->estado == 'activo' ? 'checked' : '' }}
                />
                Activo
            </label>
            
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection