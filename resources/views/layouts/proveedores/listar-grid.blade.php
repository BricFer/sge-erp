<div>
    <div>
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.home'),
            'gridUrl' => route('proveedor.grid')])
    </div>

    <div class="w-full flex flex-row gap-8 p-2">

        @forelse ($proveedores as $proveedor)
            <div class="flex flex-col justify-between text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[384px]">
                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $proveedor -> nombre }}</h2>

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
        
                    <form
                        method="POST"
                        action="{{ route('proveedor.destroy', $proveedor->id) }}"
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
</div>