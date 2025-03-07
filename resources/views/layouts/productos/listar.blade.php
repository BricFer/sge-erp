<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.home'),
            'gridUrl' => route('producto.grid')])
    </div>

    <div class="w-full">
        @section('campo1', 'Precio Compra')
        @section('campo2', 'Precio Venta')
        @section('campo3', 'IVA')
        @section('campo4', 'Descripcion')

        @include('layouts._partials.secciones')
        
        @forelse ($productos as $producto)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px] text-wrap">{{ $producto -> nombre }}</p>

                    <p class="w-[95px]">{{ $producto -> precio_compra }}€</p>

                    <p class="w-[95px]">{{ $producto -> precio_venta }}€</p>
                    
                    <p class="w-[225px]">{{ ($producto -> iva) * 100 }}%</p>
                    
                    <p class="w-[425px] text-wrap">{{ $producto ->  descripcion}}</p>

                </div>

                <div class="flex flex-row items-center gap-2">

                    {{-- Pasar el producto a almacen y que muestre un listado de los almacenes donde se encuentra el producto --}}
                    <a class="block w-[24px] h-[24px]" href="{{ route('producto.edit', ['producto' => $producto->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show button">
                    </a>

                    <a class="block w-[24px] h-[24px]" href="{{ route('producto.edit', ['producto' => $producto->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <form
                        method="POST"
                        action="{{ route('producto.destroy', $producto->id) }}"
                    >
                        @csrf
                        @method('DELETE')
                        <input
                            type="submit"
                            class="w-[24px] h-[24px] bg-[url('../../../../public/assets/icons/trash-icon.svg')] bg-no-repeat bg-cover bg-center text-transparent font-bold rounded-lg cursor-pointer border-none"
                        />
                    </form>
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
<div>