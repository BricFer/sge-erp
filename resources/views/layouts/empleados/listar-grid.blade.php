<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-6 p-2">

        @forelse ($empleados as $empleado)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px]">
                
                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $empleado -> nombre }}</h2>

                <p>
                    <span class="font-bold">Cargo:</span> {{ $empleado-> rol}}
                </p>
                <p>
                    <span class="font-bold">Teléfono:</span> {{ $empleado-> telefono}}
                </p>
                <p>
                    <span class="font-bold">Correo:</span> {{ $empleado-> correo}}
                </p>

                <div class="flex flex-row gap-2 mt-4">
                    <a class="block" href="{{ route('empleado.show', ['empleado' => $empleado->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('empleado.destroy', $empleado->id) }}"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        alt="delete icon"
                        class="warning-img w-[24px] h-[24px] cursor-pointer"
                    >
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse

    </div>
</div>