<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.proveedores.buscar')
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
                    <p class="w-[175px]">{{ $proveedor -> nombre }}</p>

                    <p class="w-[95px]">{{ $proveedor -> cif }}</p>

                    <p class="w-[95px]">{{ $proveedor -> telefono }}</p>

                    <p class="w-[225px]">{{ $proveedor -> correo }}</p>

                    <p class="w-[95px]">{{ $proveedor -> cod_postal }}</p>

                    <p class="w-[175px]">{{ $proveedor -> poblacion }}</p>

                    <p class="w-[95px]">{{ $proveedor -> provincia }}</p>

                    <p class="w-[225px]">{{ $proveedor -> domicilio }}</p>

                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('proveedor.edit', ['proveedor' => $proveedor->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <form
                        method="POST"
                        action="{{ route('proveedor.destroy', $proveedor->id) }}"
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
        {{ $proveedores ->links() }}
        
    </div>
<div>