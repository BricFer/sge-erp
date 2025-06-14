@section('title', 'ERP | Crear empleado')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.lista'),
            'gridUrl' => route('empleado.home')])
    </div>

    <form
        method="POST"
        action="{{ route('empleado.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="nombre">Nombre completo:</label>
            <input
                name="nombre"
                type="text"
                id="nombre"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('nombre_completo', '')}}"
            />
            <input
                name="legajo"
                type="hidden"
                id="legajo"
                value="{{ date("Y") }}{{ $nextId }}"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label for="dni_nif">DNI/NIF:</label>
            <input
                name="dni_nif"
                type="text"
                id="dni_nif"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('dni_nif', '')}}"
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
                id="correo"
                name="correo"
                type="email"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('correo', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="cargo">Cargo del empleado:</label>
            <input
                name="cargo"
                type="text"
                id="cargo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('cargo', '')}}"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[432px]">
            <label for="cargo">Departamento:</label>
            <select
                name="departamento"
                type="text"
                id="cargo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            >
                <option class="text-black font-bold" value="" selected disabled>Selecciona una opción</option>
                <option class="text-black" value="IT">Departamento IT</option>
                <option class="text-black" value="RRHH">Departamento RRHH</option>
                <option class="text-black" value="Marketing">Departamento Marketing</option>
                <option class="text-black" value="Finanzas">Departamento Finanzas</option>
                <option class="text-black" value="Administracion">Departamento Administración</option>
                <option class="text-black" value="Ventas">Departamento Ventas</option>
                <option class="text-black" value="Almacen">Departamento Almacen</option>
                <option class="text-black" value="Contabilidad">Departamento Contabilidad</option>
                <option class="text-black" value="Compras">Departamento Compras</option>
            </select>
        </div>

        <div class="flex flex-col gap-1 xl:mr-auto xl:w-[412px]">
            <label for="fecha_contratacion">Fecha de alta:</label>
            <input
                name="fecha_contratacion"
                type="date"
                id="fecha_contratacion"
                class="uppercase dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('fecha_contratacion', '')}}"
            />
        </div>
        
        <div class="flex flex-col gap-1 mr-auto xl:w-[412px]">
            <label for="usuario">Usuario:</label>
            <input
                type="text"
                name="usuario"
                id="usuario"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('usuario', '')}}"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection