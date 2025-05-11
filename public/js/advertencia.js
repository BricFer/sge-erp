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

    const cerrarVentanaAdvertencia = () => {
        contenedor.classList.add('hidden');
        view.style.overflow = "auto";
    };

    btnCancelar.addEventListener('click', cerrarVentanaAdvertencia);

    // Escuchar pulsación de tecla para que se cierre la ventana de advertencia
    document.addEventListener('keydown', (event) => {

        if (!contenedor.classList.contains('hidden') && event.key === 'Enter') {
            event.preventDefault(); // evita que se envíe un formulario por error
            cerrarVentanaAdvertencia();
        }
    });

})