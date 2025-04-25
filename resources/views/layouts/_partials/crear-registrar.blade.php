<div
    
    class="contenedor-mensaje fixed inset-0 flex items-center justify-center bg-white/40 hidden">
    
    <div
        id="actions-message"
        class="w-[450px] bg-white rounded-2xl shadow-xl shadow-black/20 relative m-auto"
    >

        <div class="w-full flex flex-row justify-between m-0 p-6 text-center border-2
        bg-teal-500 border-teal-500 rounded-t-2xl uppercase font-bold text-white">
            <p id="titulo-seccion"></p>

            <img class="block exit cursor-pointer" src="{{ asset('assets/icons/exit-icon.svg') }}" alt="exit icon">

        </div>
    
        <div class="w-full flex flex-col items-center gap-4 py-4 m-0">
            
            <a
                id="crear-link"
                href="#"
                class="block uppercase w-[256px] p-2 text-center rounded-lg bg-indigo-600/50 text-white"
            >
                ventas
            </a>

            <a
                id="agregar-link"
                href="#"
                class="block uppercase w-[256px] p-2 text-center rounded-lg bg-indigo-600/50 text-white"
            >
                compras
            </a>

            <a
                id="listar-link"
                href="#"
                class="block uppercase w-[256px] p-2 text-center rounded-lg bg-indigo-600/50 text-white"
            >
                listar
            </a>
    
        </div>
    </div>
</div>

<script src="{{ asset('js/crear-listar.js') }}" defer></script>