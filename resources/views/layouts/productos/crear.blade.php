@section('title', 'ERP | Crear producto')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('producto.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.lista'),
            'gridUrl' => route('producto.home')])
    </div>

    <form
        method="POST"
        action="{{ route('producto.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @csrf
        <div class="flex flex-col gap-1 xl:w-full">
            <label for="nombre">Nombre del producto:</label>
            <input
                name="nombre"
                type="text"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                id="nombre"
                value="{{ old('nombre', '')}}"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="categoria">Categoria:</label>
            <select
                name="categoria"
                type="text"
                id="categorias"
                class="w-[417px] bg-transparent dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
            >
                <option class="text-black" value="" selected disabled>Selecciona una categoría</option>
                <option class="text-black" value="informatica">Informática</option>
                <option class="text-black" value="tablets y ordenadores">Tablets & Ordenadores</option>
                <option class="text-black" value="gaming">Gaming</option>
                <option class="text-black" value="telefonia">Telefonía</option>
                <option class="text-black" value="accesorios de informatica">Accesorios de informática</option>
                <option class="text-black" value="television">Televisión</option>
                <option class="text-black" value="otras categorias">Otras categorías</option>
            </select>
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="precio_venta">Precio de venta:</label>
            <input
                name="precio_venta"
                type="text"
                id="precio_venta"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('precio_venta', '')}}"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="iva">IVA (%)</label>
            <input
                name="iva"
                type="text"
                id="iva"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('iva', '')}}"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-full">
            <label for="descripcion">Descripcion:</label>
            <input
                name="descripcion"
                type="text"
                id="descripcion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                value="{{ old('descripcion', '')}}"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection