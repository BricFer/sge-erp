<div>
    <div>
        @include('layouts._partials.messages')
        
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-6 p-2">

        @forelse ($almacenes as $almacen)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px]">

                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $almacen -> nombre }}</h2>

                <p>
                    <span class="font-bold">Ubicación:</span> {{ $almacen-> ubicacion}}
                </p>

                <div class="flex flex-row gap-2 mt-4">

                    <a class="block" href="{{ route('almacen.show', ['almacen' => $almacen->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('almacen.destroy', $almacen->id) }}"
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
