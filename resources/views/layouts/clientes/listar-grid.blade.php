<div>
    <div>
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.home'),
            'gridUrl' => route('cliente.grid')])
    </div>

    <div class="w-full flex flex-row gap-8 p-2">

        @forelse ($clientes as $cliente)
            <div class="flex flex-col justify-between text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[384px]">
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
        
                    <form
                        method="POST"
                        action="{{ route('cliente.destroy', $cliente->id) }}"
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