@section('title', 'ERP | Crear producto')

@extends('dashboard')

@section('content')
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('producto.home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.home'),
            'gridUrl' => route('producto.grid')])
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
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="precio_compra">Precio de compra:</label>
            <input
                name="precio_compra"
                type="text"
                id="precio_compra"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="precio_venta">Precio de venta:</label>
            <input
                name="precio_venta"
                type="text"
                id="precio_venta"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label for="iva">IVA (%)</label>
            <input
                name="iva"
                type="text"
                id="iva"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>
        
        <div class="flex flex-col gap-1 xl:w-full">
            <label for="descripcion">Descripcion:</label>
            <input
                name="descripcion"
                type="text"
                id="descripcion"
                class="dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
            />
        </div>

        @include('layouts._partials.submit-cancel')
    </form>
@endsection