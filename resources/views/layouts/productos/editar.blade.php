@section('title', 'ERP | Editar producto')

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
        action="{{ route('producto.update', $producto->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-full">
            <label for="nombre">Nombre del producto:</label>
            <input
                name="nombre"
                value="{{ old('nombre', $producto->nombre) }}"
                type="text"
                id="nombre"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                readonly
            />

            <input
                type="hidden"
                name="codigo"
                id="codigo"
                value="{{ $producto->codigo }}"
                readonly
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
                <option class="text-black" value="informatica" {{ $producto->categoria == 'informatica' ? 'selected' : ''}}>Informática</option>
                <option class="text-black" value="tablets y ordenadores" {{ $producto->categoria == 'tablets y ordenadores' ? 'selected' : ''}}>Tablets & Ordenadores</option>
                <option class="text-black" value="gaming" {{ $producto->categoria == 'gaming' ? 'selected' : ''}}>Gaming</option>
                <option class="text-black" value="telefonia" {{ $producto->categoria == 'telefonia' ? 'selected' : ''}}>Telefonía</option>
                <option class="text-black" value="accesorios de informatica" {{ $producto->categoria == 'accesorios de informatica' ? 'selected' : ''}}>Accesorios de informática</option>
                <option class="text-black" value="television" {{ $producto->categoria == 'television' ? 'selected' : ''}}>Televisión</option>
                <option class="text-black" value="otras categorias" {{ $producto->categoria == 'otras categorias' ? 'selected' : ''}}>Otras categorías</option>
            </select>
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="precio_venta">Precio de venta</label>
            <input
                name="precio_venta"
                value="{{ old('precio_venta', $producto->precio_venta) }}"
                type="text"
                id="precio_venta"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="iva">IVA (%)</label>
            <input
                name="iva"
                value="{{ old('iva', $producto->iva) }}"
                type="text"
                id="iva"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-full">
            <label for="descripcion">Descripcion:</label>
            <input
                name="descripcion"
                value="{{ old('descripcion', $producto->descripcion) }}"
                type="text"
                id="descripcion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection