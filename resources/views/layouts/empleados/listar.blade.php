<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('empleado.crear'),
            'listUrl' => route('empleado.home'),
            'gridUrl' => route('empleado.grid')])
    </div>
    
    <div class="w-full">
        @section('campo1', 'DNI/NIF')
        @section('campo2', 'Teléfono')
        @section('campo3', 'Correo')
        @section('campo4', 'Fecha Alta')
        @section('campo5', 'Cargo')
        @section('campo6', 'Estado')

        @include('layouts._partials.secciones')
        
        @forelse ($empleados as $empleado)

        @php
            // Dependendiendo del estado del empleado asignamos un color diferente
        
            $estado = match ($empleado->estado) {
                'baja voluntaria' => 'text-blue-700',
                'excedencia' => 'text-orange-500',
                'despido' => 'text-red-600',
                'activo' => 'text-green-500',
                default => 'text-gray-600',
            };
        
        @endphp

            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $empleado -> nombre }}</p>
                    
                    <p class="w-[95px]">{{ $empleado -> dni_nif }}</p>
                    
                    <div class="w-[115px]">{{ $empleado -> telefono }}</div>

                    <p class="w-[225px]">{{ $empleado -> correo }}</p>
                    
                    <p class="w-[95px]">{{ $empleado -> fecha_contratacion }}</p>

                    <p class="w-[175px] text-wrap">{{ $empleado -> cargo }}</p>
                    
                    <p class="w-[95px] font-bold {{ $estado }}">{{ ucfirst($empleado-> estado) }}</p>
                    
                </div>

                <div class="flex flex-row items-center gap-2">
                    <a class="block" href="{{ route('empleado.show', ['empleado' => $empleado->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>
                    
                    <a class="block" href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('empleado.destroy', $empleado->id) }}"
                        src="{{ asset('assets/icons/trash-icon.svg') }}"
                        alt="delete icon"
                        class="warning-img w-[24px] h-[24px] cursor-pointer"
                    >
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
<div>