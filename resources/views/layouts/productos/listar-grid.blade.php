<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('producto.crear'),
            'listUrl' => route('producto.home'),
            'gridUrl' => route('producto.grid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-4 p-2">

        @forelse ($productos as $producto)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px] max-md:w-full">

                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $producto -> nombre }}</h2>

                <p>
                    <span class="font-bold">Precio compra:</span> {{ $producto-> precio_compra}}€
                </p>
                <p>
                    <span class="font-bold">Precio venta:</span> {{ $producto-> precio_venta}}€
                </p>
                <p>
                    <span class="font-bold">IVA:</span> {{ $producto-> iva }}%
                </p>

                <div class="flex flex-row gap-2 mt-4">
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
</div>