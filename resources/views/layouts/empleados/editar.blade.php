@section('title', 'ERP | Editar empleado')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('empleado.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>

    @include('layouts._partials.messages')
    
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
                value="{{ $empleado->nombre }}"
                type="text"
                id="nombre"
                readonly
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[628px]">
            <label>Cargo que ocupa:</label>
            <input
                name="rol"
                value="{{ $empleado->rol }}"
                type="text"
                id="rol"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[412px]">
            <label>Teléfono</label>
            <input
                name="telefono"
                value="{{ $empleado->telefono }}"
                type="tel"
                id="telefono"
            />
        </div>

        <div class="flex flex-col gap-1 w-[845px]">
            <label>Correo</label>
            <input
                name="correo"
                value="{{ $empleado->correo }}"
                type="email"
                id="correo"
                readonly
            />
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Editar"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />

            <a
                href="{{ route('empleado.home') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancelar
            </a>

        </div>
    </form>
@endsection