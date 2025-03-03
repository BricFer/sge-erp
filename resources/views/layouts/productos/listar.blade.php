<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.productos.buscar')
    </div>

    
    <div class="w-full">
        @section('campo1', 'Almacen')
        @section('campo2', 'IVA')
        @section('campo3', 'Precio Compra')
        @section('campo4', 'Precio Venta')

        @include('layouts._partials.secciones')
        
        @forelse ($productos as $producto)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $producto -> nombre }}</p>

                    <p class="w-[95px]">{{ $producto -> id_almacen }}</p>

                    <p class="w-[95px]">{{ ($producto -> iva) * 100 }}%</p>
                    
                    <p class="w-[225px]">{{ $producto -> precio_compra }}€</p>

                    <p class="w-[95px]">{{ $producto -> precio_venta }}€</p>

                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('producto.edit', ['producto' => $producto->id]) }}">
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
            <p>Aún no hay registros</p>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $productos->links() }}
        
    </div>
<div>