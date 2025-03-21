<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('servicio.crear'),
            'listUrl' => route('servicio.home'),
            'gridUrl' => route('servicio.grid')])
    </div>
    
    <div class="w-full">

        @section('campo1', 'Descripcion')
        @section('campo2', 'Precio')
        @section('campo3', 'Tipo de Serv.')

        @include('layouts._partials.secciones')
        
        @forelse ($servicios as $servicio)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $servicio -> nombre }}</p>

                    <p class="w-[95px]">{{ $servicio -> precio }}</p>

                    <p class="w-[115px]">{{ $servicio -> tipo_servicio }}</p>

                    <p class="w-[225px]">{{ $servicio -> descripcion }}</p>
                    
                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('servicio.show', ['servicio' => $servicio->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('servicio.edit', ['servicio' => $servicio->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('servicio.destroy', $servicio->id) }}"
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
<div>