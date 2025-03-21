<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('almacen.crear'),
            'listUrl' => route('almacen.home'),
            'gridUrl' => route('almacen.grid')])
    </div>

    <div class="w-full">

        @section('campo2', 'Capacidad')
        @section('campo3', 'Estado')
        @section('campo4', 'Ubicación')

        @include('layouts._partials.secciones')
        
        @forelse ($almacenes as $almacen)

            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[295px]">{{ $almacen -> nombre }}</p>

                    <p class="w-[115px]">{{ $almacen -> capacidad }}m³</p>

                    <p class="w-[225px]">{{ $almacen -> estado }}</p>
                    
                    <p class="w-[225px]">{{ $almacen -> ubicacion }}</p>

                </div>

                <div class="flex flex-row items-center gap-2">

                {{-- Me redirige a una vista con todos los productos de ese almacen --}}

                    <a class="block" href="{{ route('almacen.productos', ['almacen' => $almacen->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('almacen.edit', ['almacen' => $almacen->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('almacen.destroy', $almacen->id) }}"
                        id="warning-img"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        class="warning-img w-[24px] h-[24px] rounded-lg cursor-pointer"
                    >
                </div>

            </div>
            
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
<div>