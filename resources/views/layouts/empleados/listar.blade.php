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

        @if( Auth::user()->empleado?->departamento === 'RRHH' )
            @section('campo1', 'DNI/NIF')
            @section('campo2', 'Estado')
            @section('campo3', 'Correo')
            @section('campo4', 'Fecha Alta')
            @section('campo5', 'Cargo')
            @section('campo6', 'Legajo')
            @section('campo7', 'Departamento')
        @else
            @section('campo1', 'Email')
            @section('campo3', 'Cargo')
            @section('campo4', 'Departamento')
        @endif


        @include('layouts._partials.secciones')
        
        @forelse ($empleados as $empleado)

            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 md:justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $empleado->nombre_completo }}</p>
                    
                    @if( Auth::user()->empleado?->departamento === 'RRHH' )

                        <p class="w-[95px]">{{ $empleado->dni_nif }}</p>
                        
                        <p class="w-[115px]">{{ ucfirst($empleado->estado) }}</p>

                        <p class="w-[225px]">{{ $empleado->correo }}</p>
                        
                        <p class="w-[95px]">{{ $empleado->fecha_contratacion }}</p>

                        <p class="w-[175px] text-wrap">{{ $empleado->cargo }}</p>
                        
                        <p class="w-[95px]">{{ ucfirst($empleado->legajo) }}</p>

                        <p class="w-[225px]">{{ $empleado->departamento }}</p>
                    @else
                        <p class="w-[235px]">{{ $empleado->correo }}</p>
                        <p class="w-[225px] text-wrap">{{ $empleado->cargo }}</p>
                        <p>{{ $empleado->departamento }}</p>
                    @endif

                    
                </div>

                <div class="flex flex-row gap-2">
                    <a class="block" href="{{ route('empleado.show', ['empleado' => $empleado->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>
                    
                    @if(Auth::user()->empleado?->departamento === 'RRHH')
                        <a class="block" href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}">
                            <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                        </a>
            
                        <img
                            data-action="{{ route('empleado.destroy', $empleado->id) }}"
                            src="{{ asset('assets/icons/trash-icon.svg') }}"
                            alt="delete icon"
                            class="warning-img w-[24px] h-[24px] cursor-pointer"
                        >
                    @endif
                </div>
            </div>
        @empty
            <p>No hay registros</p>
        @endforelse
    </div>
<div>