<div id="contenedor-mensaje" class="fixed inset-0 flex items-center justify-center bg-[#0a0a0a]/40 hidden h-screen">
    
    <div id="warning-message" class="w-[450px] relative bg-[#FDFDFC]/95 rounded-xl shadow-xl shadow-white/20">
        <p class="w-full m-0 p-6 text-center text-white border-2 border-red-700 bg-red-700 rounded-t-xl font-bold text-xl">¡ADVERTENCIA!</p>
    
        <div class="w-full p-2 m-0 text-[#0a0a0a]">
            <p class="font-bold uppercase my-2 text-lg text-center">Esta acción no se podrá deshacer.</p>
            <p class="text-center">¿Seguro que deseas continuar?</p>
        </div>
    
        <div class="w-full flex flex-row justify-center gap-4 py-4 m-0">
            
            <button
                id="cancelar"
                class="block text-center border-2 p-2 border-red-700 bg-red-700 text-white rounded-lg w-36">Cancelar</button>
            
            <form
                id="borrar"
                method="POST"
                class="block text-center border-2 p-2 border-indigo-600 bg-indigo-600 text-white rounded-lg w-36 cursor-pointer"
            >
                @csrf
                @method('DELETE')
                <input
                    type="submit"
                    value="Confirmar"
                />
            </form>
    
        </div>
    </div>
</div>

<script src="{{ asset('js/advertencia.js') }}" defer></script>