<div>
    <div>

        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('proveedor.crear'),
            'listUrl' => route('proveedor.lista'),
            'gridUrl' => route('proveedor.home')])
    </div>

    <div class="w-full">

        @section('campo1', 'CIF')
        @section('campo2', 'Teléfono')
        @section('campo3', 'Correo')
        @section('campo4', 'Cod. Postal')
        @section('campo5', 'Población')
        @section('campo6', 'Provincia')
        @section('campo7', 'Dirección')

        @include('layouts._partials.secciones')
        
        @forelse ($proveedores as $proveedor)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px] text-wrap">{{ $proveedor -> nombre_completo }}</p>

                    <p class="w-[95px]">{{ $proveedor -> cif }}</p>

                    <p class="w-[115px]">{{ $proveedor -> telefono }}</p>

                    <p class="w-[225px]">{{ $proveedor -> correo }}</p>

                    <p class="w-[95px]">{{ $proveedor -> cod_postal }}</p>

                    <p class="w-[175px]">{{ $proveedor -> poblacion }}</p>

                    <p class="w-[95px] text-wrap">{{ $proveedor -> provincia }}</p>

                    <p class="w-[225px]">{{ $proveedor -> domicilio }}</p>

                </div>

                <div class="flex flex-row items-center gap-2">

                    <a class="block" href="{{ route('proveedor.show', ['proveedor' => $proveedor->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>
    
                    <a class="block" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('proveedor.destroy', $proveedor->id) }}"
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
<div>