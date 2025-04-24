<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.home'),
            'gridUrl' => route('proveedor.grid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-4 p-2">

        @forelse ($proveedores as $proveedor)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px] max-md:w-full">

                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $proveedor -> nombre_completo }}</h2>

                <p>
                    <span class="font-bold">Dirección:</span> {{ $proveedor-> domicilio}}
                </p>
                <p>
                    <span class="font-bold">Teléfono:</span> {{ $proveedor-> telefono}}
                </p>
                <p>
                    <span class="font-bold">Correo:</span> {{ $proveedor-> correo}}
                </p>

                <div class="flex flex-row gap-2 mt-4">

                    <a class="block" href="{{ route('proveedor.show', ['proveedor' => $proveedor->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>
    
                    <a class="block" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('proveedor.destroy', $proveedor->id) }}"
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