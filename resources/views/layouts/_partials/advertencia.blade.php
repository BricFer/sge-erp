<div id="contenedor-mensaje" class="absolute inset-0 flex items-center justify-center bg-white/40 hidden h-screen">
    
    <div id="warning-message" class="w-[450px] bg-white rounded-2xl shadow-xl shadow-black/20 relative m-auto">
        <p class="w-full m-0 p-6 text-center text-white border-2 border-red-700 bg-red-700 rounded-t-2xl">¡ADVERTENCIA!</p>
    
        <div class="w-full p-2 m-0">
            <p class="font-bold uppercase my-2 text-center">Esta acción no se podrá deshacer.</p>
            <p>¿Seguro que deseas continuar?</p>
        </div>
    
        <div class="w-full flex flex-row justify-center gap-4 py-4 m-0">
            
            <button id="cancelar" class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 text-white rounded-lg w-36">Cancelar</button>
            
            <form
                id="borrar"
                method="POST"
            >
                @csrf
                @method('DELETE')
                <input
                    type="submit"
                    value="Confirmar"
                    class="block text-center border-2 border-red-700 p-2 bg-red-700 text-white rounded-lg w-36 cursor-pointer"
                />
            </form>
    
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const view = document.querySelector('html');
        
        const contenedor = document.getElementById('contenedor-mensaje');

        const btnCancelar = document.getElementById('cancelar');
        
        const btnDanger = document.querySelectorAll('.warning-img');

        const borrarForm = document.getElementById('borrar');

        btnDanger.forEach( (btn) => {
            
            btn.addEventListener('click', () => {
                view.style.overflow = "hidden";

                // Extraemos el data-action, que contiene el action que se pasará al formulario
                const action = btn.getAttribute('data-action');

                // Se le pasa la acción al boton en la ventana de advertencia
                borrarForm.setAttribute('action', action);
                contenedor.classList.remove('hidden');
            })
        });

        btnCancelar.addEventListener('click', () => {
            contenedor.classList.add('hidden');
            view.style.overflow = "auto";
        });
    })
</script>