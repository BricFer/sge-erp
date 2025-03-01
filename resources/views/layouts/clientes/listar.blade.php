<div class="w-full">
    @forelse ($clientes as $cliente)
        <div class="flex flex-row flex-wrap items-center gap-4 md:justify-between md:flex-nowrap p-4">

            <div class="flex flex-row flex-wrap items-center gap-6">
                <p>{{ $cliente -> nombre }}</p>
                <p>{{ $cliente -> apellido }}</p>
                <p>{{ $cliente -> nif }}</p>
                <p>{{ $cliente -> domicilio }}</p>
                <p>{{ $cliente -> cod_postal }}</p>
                <p>{{ $cliente -> poblacion }}</p>
                <p>{{ $cliente -> provincia }}</p>
                <p>{{ $cliente -> telefono }}</p>
                <p>{{ $cliente -> correo }}</p>
            </div>

            <div class="flex flex-row items-center gap-2">
                <a class="block" href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
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
