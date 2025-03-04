<div>
    <div>

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts.empleados.buscar')
    </div>
    
    <div class="w-full">
        @section('campo1', 'Teléfono')
        @section('campo3', 'Correo')
        @section('campo4', 'Cargo')

        @include('layouts._partials.secciones')
        
        @forelse ($empleados as $empleado)
            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $empleado -> nombre }}</p>
                    
                    <p class="w-[95px]">{{ $empleado -> telefono }}</p>
                    
                    <p class="w-[95px]"></p>

                    <p class="w-[225px]">{{ $empleado -> correo }}</p>
                    
                    <p class="w-[175px]">{{ $empleado -> rol }}</p>
                    
                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}">
                        <img class="block" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <form
                        method="POST"
                        action="{{ route('empleado.destroy', $empleado->id) }}"
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
        {{ $empleados->links() }}
        
    </div>
<div>