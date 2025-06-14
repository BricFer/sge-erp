const btnAgregarProducto = document.querySelector('#agregar-prod');
const productos = document.querySelector('#productos');


const habilitarEdicionStock = ( form ) => {
    document.getElementById( form ).classList.remove('hidden');
}

const cancelarEdicionStock = ( form ) => {
    document.getElementById( form ).classList.add('hidden');
}

btnAgregarProducto.addEventListener('click', () => {
    productos.insertAdjacentHTML('beforeend', `
        <div class="flex flex-row items-center gap-4 p-4 border-b-solid border-b-2 border-b-indigo-600/25 justify-between md:flex-nowrap">

            <div class="flex flex-row flex-wrap items-center gap-6 text-nowrap">
                <p class="w-[175px] text-wrap">{{ $producto->nombre }}</p>

                <p class="w-[95px]">{{ $producto-> precio_compra }}€</p>

                <p class="w-[115px]">{{ $producto-> precio_venta }}€</p>
                
                <p class="w-[225px]">{{ $producto-> iva}}%</p>
                
                <p class="w-[425px] text-wrap">{{ $producto -> descripcion}}</p>

                <p class="w-[95px] text-wrap">{{ $producto->pivot-> stock}}</p>

            </div>

            <form
                id="stock-{{ $producto->id }}"
                action="{{ route('almacen.stock', [$almacen->id, $producto->id]) }}"
                method="post"
                class="flex flex-row items-center justify-center bg-transparent m-0 hidden"
            >
                @method('PUT')
                @csrf
                <input
                    type="text"
                    name="stock"
                    value="{{ $producto->pivot->stock }}"
                    class="w-[75px] dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-transparent"
                />

                <input type="image" src="{{ asset('assets/icons/confirm-icon.svg') }}">

                <button class="m-0 inline-block" onclick="cancelarEdicionStock('stock-{{ $producto->id }}')">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/x-icon.svg') }}" alt="cancel button">
                </button>
            </form>

            <div class="flex flex-row items-center gap-2">

                <button onclick="habilitarEdicionStock('stock-{{ $producto->id }}')">
                    <img class="block w-[24px] h-[24px]" src="{{ asset('assets/icons/edit-icon.svg') }}" alt="edit button">
                </button>
    
                <img
                    data-action="{{ route('almacen.destroy', $almacen->id) }}"
                    id="warning-img"
                    src="{{ asset('assets/icons/trash-icon.svg') }}"
                    class="warning-img w-[24px] h-[24px] rounded-lg cursor-pointer"
                >
            </div>

        </div>    
    `)
});