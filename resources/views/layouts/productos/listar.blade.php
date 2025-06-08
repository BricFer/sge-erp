<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.lista'),
            'gridUrl' => route('producto.home')])
    </div>

    <div class="w-full">
        @section('campo1', 'Descripcion')
        @section('campo4', 'IVA')
        @section('campo5', 'Precio Compra')
        @section('campo6', 'Precio Venta')
        @section('campo7', 'Stock total')

        @include('layouts._partials.secciones')
        
        @forelse ($productos as $producto)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px] text-wrap">{{ $producto -> nombre }}</p>

                    <p class="w-[95px]">{{ $producto ->  descripcion}}</p>
                    
                    <p class="w-[115px]"></p>

                    <p class="w-[225px]"></p>

                    <p class="w-[95px]">{{ $producto -> iva}}%</p>

                    <p class="w-[175px]">{{ $producto -> precio_compra }}€</p>

                    <p class="w-[95px]">{{ $producto -> precio_venta }}€</p>

                    <p class="w-[175px]">{{ $producto->stockTotal() }}</p>

                </div>

                <div class="flex flex-row items-center gap-2">

                    {{-- Pasar el producto a almacen y que muestre un listado de los almacenes donde se encuentra el producto --}}
                    <a class="block w-[24px] h-[24px]" href="{{ route('producto.almacenes', ['producto' => $producto->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block w-[24px] h-[24px]" href="{{ route('producto.edit', ['producto' => $producto->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('producto.destroy', $producto->id) }}"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        alt="delete icon"
                        class="warning-img block w-[24px] h-[24px] rounded-lg cursor-pointer"
                    >
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
<div>