<div>
    <div>
        @include('layouts._partials.messages')
        
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.home'),
            'gridUrl' => route('cliente.grid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-6 p-2">

        @forelse ($clientes as $cliente)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px]">

                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $cliente -> nombre }} {{ $cliente -> apellido }}</h2>

                <p>
                    <span class="font-bold">Dirección:</span> {{ $cliente-> domicilio}}
                </p>
                <p>
                    <span class="font-bold">Teléfono:</span> {{ $cliente-> telefono}}
                </p>
                <p>
                    <span class="font-bold">Correo:</span> {{ $cliente-> correo}}
                </p>

                <div class="flex flex-row gap-2 mt-4">
                    <a class="block" href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show button">
                    </a>

                    <a class="block" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('cliente.destroy', $cliente->id) }}"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        alt="delete icon"
                        class="warning-img block w-[24px] h-[24px] cursor-pointer"
                    >
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
</div>