<div>
    <div>
        @include('layouts._partials.messages')
        
        @include('layouts._partials.nav-bar', ['backUrl' => route('home')])

        @include('layouts._partials.buscar', [
            'addUrl' => route('factura.crear.compras'),
            'listUrl' => route('factura.compras'),
            'gridUrl' => route('factura.comprasgrid')])
    </div>

    <div class="w-full flex flex-row flex-wrap gap-4 p-2">

        @forelse ($facturas as $factura)
            <div class="text-sm/7 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/25 w-[360px] max-md:w-full">

                <h2 class="text-lg font-bold tracking-wide text-indigo-600">{{ $factura->facturable->nombre_completo }}</h2>

                <p>
                    <span class="font-bold">Emitida por:</span> {{ $factura->empleado->nombre_completo }}
                </p>

                <p>
                    <span class="font-bold">Fecha emisión:</span> {{ $factura->fecha_emision }}
                </p>

                <p>
                    <span class="font-bold">Serie:</span> {{ $factura->serie }}
                </p>
                
                <p>
                    <span class="font-bold">Total:</span> {{ $factura->monto_total }}€
                </p>


                <div class="flex flex-row gap-2 mt-4">

                    <a class="block" href="{{ route('factura.productos', ['factura' => $factura->id]) }}">
                        <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/show-icon.svg') }}" alt="show info button">
                    </a>
        
                    <img
                        data-action="{{ route('factura.destroy', $factura->id) }}"
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
</div>
