<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.clientes.buscar')
    </div>

    {{-- Esta es una forma de pasar la paginación al componente que la renderizará
        @include('layouts._partials.buscar', ['clientes' => $clientes])
    --}}
    
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
                    <p class="w-[175px]">{{ $cliente -> nombre }} {{ $cliente -> apellido }}</p>

                    <p class="w-[95px]">{{ $cliente -> nif }}</p>

                    <p class="w-[95px]">{{ $cliente -> telefono }}</p>

                    <p class="w-[225px]">{{ $cliente -> correo }}</p>
                    
                    <p class="w-[95px]">{{ $cliente -> cod_postal }}</p>
                    
                    <p class="w-[175px]">{{ $cliente -> poblacion }}</p>

                    <p class="w-[95px]">{{ $cliente -> provincia }}</p>

                    <p class="w-[225px]">{{ $cliente -> domicilio }}</p>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="w-[24px] h-[24px] block" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
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
            <p>Aún no hay registros</p>
        @endforelse
    </div>
<div>