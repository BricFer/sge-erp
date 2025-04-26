<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('cliente.crear'),
            'listUrl' => route('cliente.home'),
            'gridUrl' => route('cliente.grid')])
    </div>
    
    <div class="w-full">

        @section('campo1', 'NIF')
        @section('campo2', 'Teléfono')
        @section('campo3', 'Correo')
        @section('campo4', 'Cod. Postal')
        @section('campo5', 'Población')
        @section('campo6', 'Provincia')
        @section('campo7', 'Dirección')

        @include('layouts._partials.secciones')
        
        @forelse ($clientes as $cliente)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $cliente -> nombre_completo }}</p>

                    <p class="w-[95px]">{{ $cliente -> nif }}</p>

                    <p class="w-[115px]">{{ $cliente -> telefono }}</p>

                    <p class="w-[225px] text-wrap">{{ $cliente -> correo }}</p>
                    
                    <p class="w-[95px]">{{ $cliente -> cod_postal }}</p>
                    
                    <p class="w-[175px]">{{ $cliente -> poblacion }}</p>

                    <p class="w-[95px] text-wrap">{{ $cliente -> provincia }}</p>

                    <p class="w-[225px] text-wrap">{{ $cliente -> domicilio }}</p>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
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
<div>