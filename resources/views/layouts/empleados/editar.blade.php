@section('title', 'ERP | Editar empleado')

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
        action="{{ route('empleado.update', $empleado->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label for="nombre">Nombre completo:</label>
            <input
                name="nombre"
                value="{{ $empleado->nombre_completo }}"
                type="text"
                id="nombre"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[628px]">
            <label for="dni_nif">DNI/NIF:</label>
            <input
                name="dni_nif"
                value="{{ $empleado->dni_nif }}"
                type="text"
                id="dni_nif"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label for="telefono">Teléfono</label>
            <input
                name="telefono"
                value="{{ $empleado->telefono }}"
                type="tel"
                id="telefono"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 w-[845px]">
            <label for="correo">Correo</label>
            <input
                name="correo"
                value="{{ $empleado->correo }}"
                type="email"
                id="correo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>
                
        <div class="flex flex-col gap-1 xl:w-[417px]">
            <label for="cargo">Cargo que ocupa:</label>
            <input
                name="cargo"
                value="{{ $empleado->cargo }}"
                type="text"
                id="cargo"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>       
            
        <div class="flex flex-col gap-1 xl:w-[417px]">
            <label for="fecha_contratacion">Fecha alta:</label>
            <input
                name="fecha_contratacion"
                value="{{ $empleado->fecha_contratacion }}"
                type="text"
                id="fecha_contratacion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[417px]">
            <label for="estado">Estado del empleado:</label>
            <input
                name="estado"
                value="{{ ucfirst($empleado->estado) }}"
                type="text"
                id="estado"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                {{ $empleado->estado == 'despido' ? 'readonly' : ''}}
            />
        </div>
        
        <div class="flex flex-col gap-1">
            <label for="legajo">Legajo:</label>
            <input
                id="legajo"
                name="legajo"
                value="{{ $empleado->legajo }}"
                type="text"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection