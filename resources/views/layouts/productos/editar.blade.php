@section('title', 'ERP | Editar producto')

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
        action="{{ route('producto.update', $producto->id) }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >

        @method('PUT')
        @csrf
        <div class="flex flex-col gap-1 lg:w-full">
            <label for="nombre">Nombre del producto:</label>
            <input
                name="nombre"
                value="{{ $producto->nombre }}"
                type="text"
                id="nombre"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 lg:w-[415px]">
            <label>Precio de compra:</label>
            <input
                name="precio_compra"
                value="{{ $producto->precio_compra }}"
                type="text"
                id="precio_compra"
                readonly
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label>Precio de venta</label>
            <input
                name="precio_venta"
                value="{{ $producto->precio_venta }}"
                type="text"
                id="precio_venta"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-[415px]">
            <label>IVA</label>
            <input
                name="iva"
                value="{{ $producto->iva }}"
                type="text"
                id="iva"
            />
        </div>

        <div class="flex flex-col gap-1 xl:w-full">
            <label>Descripcion:</label>
            <input
                name="descripcion"
                value="{{ $producto->descripcion }}"
                type="text"
                id="descripcion"
            />
        </div>

        <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
            <input
                type="submit"
                value="Editar"
                class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
            />

            <a
                href="{{ route('producto.home') }}"
                class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
            >
                Cancelar
            </a>

        </div>
    </form>
@endsection