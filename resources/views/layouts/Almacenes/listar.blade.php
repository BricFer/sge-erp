<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.almacenes.buscar')
    </div>

    <div class="w-full">

        @section('campo1', 'Ubicación')

        @include('layouts._partials.secciones')
        
        @forelse ($almacenes as $almacen)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $almacen -> nombre }}</p>

                    <p class="w-[95px]">{{ $almacen -> ubicacion }}</p>

                </div>

                <div class="flex flex-row items-center gap-2">

                {{-- Me redirige a una vista con todos los productos de ese almacen --}}

                    <a class="block" href="{{ route('almacen.show', ['almacen' => $almacen->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
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
    <div class="mt-4">
        {{ $almacenes ->links() }}
        
    </div>
<div>