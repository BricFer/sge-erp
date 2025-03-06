<div>
    <div>
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.almacenes.buscar')
    </div>

    <div class="w-full flex flex-row gap-8 p-2">

        @forelse ($almacenes as $almacen)
            <div class="flex flex-col justify-between text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[384px]">
                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $almacen -> nombre }}</h2>

                <p>
                    <span class="font-bold">Ubicación:</span> {{ $almacen-> ubicacion}}
                </p>

                <div class="flex flex-row gap-2 mt-4">

                    <a class="block w-[24px] h-[24px]" href="{{ route('almacen.show', ['almacen' => $almacen->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block w-[24px] h-[24px]" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <form
                        method="POST"
                        action="{{ route('almacen.destroy', $almacen->id) }}"
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
</div>