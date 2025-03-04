@section('title', 'ERP | Crear producto')

@extends('dashboard')

@section('content')
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('producto.home')])

        @include('layouts.productos.buscar')
    </div>
    <form
        method="POST"
        action="{{ route('producto.store') }}"
        class="flex flex-col px-2 w-full gap-6 xl:flex-row xl:flex-wrap xl:gap-1 xl:justify-between xl:max-w-7xl xl:m-auto"
    >
    @csrf
    <div class="flex flex-col gap-1 xl:w-[628px]">
        <label for="nombre">Nombre del producto:</label>
        <input name="nombre" type="text" class="form-control" id="nombre">
    </div>
    
    @error('nombre')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 xl:w-[628px]">
        <label>Almacen:</label>
        <input name="id_almacen" type="text">
    </div>

    @error('almacen')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 xl:w-[628px]">
        <label>Precio de compra:</label>
        <input name="precio_compra" type="text">
    </div>

    @error('precio_compra')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1 xl:w-[628px]">
        <label>Precio de venta:</label>
        <input name="precio_venta" type="text">
    </div>
    
    @error('precio_venta')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col gap-1">
        <label>IVA</label>
        <input name="iva" type="text">
    </div>

    @error('iva')
        <p style="color:red">{{$message}}</p>
    @enderror

    <div class="flex flex-col w-full gap-4 my-6 md:flex-row">
        <a
            href="{{ route('producto.home') }}"
            class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96"
        >
            Cancel
        </a>

        <input
            type="submit"
            value="Crear"
            class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96"
        />
    </div>

    </form>
@endsection