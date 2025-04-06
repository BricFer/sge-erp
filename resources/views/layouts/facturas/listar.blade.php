<div>
    <div>
        @include('layouts._partials.messages')

        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('factura.crear'),
            'listUrl' => route('factura.home'),
            'gridUrl' => route('factura.grid')])
    </div>

    <div class="w-full">

        @section('campo1', 'Serie')
        @section('campo2', 'Emitida por')
        @section('campo3', 'F. Emisión')
        @section('campo4', 'Subtotal')
        @section('campo5', 'Descuento')
        @section('campo6', 'Total')
        @section('campo7', 'Estado')

        @include('layouts._partials.secciones')
        
        @forelse ($facturas as $factura)

            <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between md:flex-nowrap">

                <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                    <p class="w-[175px]">{{ $factura->facturable->nombre_completo }}</p>

                    <p class="w-[95px]">{{ $factura->serie }}</p>

                    <p class="w-[115px]">{{ $factura->empleado->nombre }}</p>
                    
                    <p class="w-[225px]">{{ $factura->fecha_emision}}</p>
                    
                    <p class="w-[95px]">{{ $factura->monto_subtotal }}€</p>

                    <p class="w-[175px]">{{ $factura->monto_descuento }}€</p>

                    <p class="w-[95px]">{{ $factura->monto_total }}€</p>
                    
                    <p class="w-[225px]">{{ ucfirst($factura->estado) }}</p>
                    

                </div>

                <div class="flex flex-row items-center gap-2">

                    <a class="block" href="{{ route('factura.show', ['factura' => $factura->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>

                    <a class="block" href="{{ route('factura.edit', ['factura' => $factura->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                    </a>
        
                    <img
                        data-action="{{ route('factura.destroy', $factura->id) }}"
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