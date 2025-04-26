document.addEventListener('DOMContentLoaded', () => {

    const view = document.querySelector('html');

    // Los elementos que llamaran al listado de opciones (Albaran, presupuesto y facturas)
    const mostrarOpciones = document.querySelectorAll('.mostrarOpciones');
    
    // El contendor que muestra las opciones
    const contenedorMensaje = document.querySelector('.contenedor-mensaje');

    let tituloSeccion = '';
    
    mostrarOpciones.forEach( (mostrar) => {

        mostrar.addEventListener('click', ( { target } ) => {

            tituloSeccion = `${ target.getAttribute('id') }`;

            view.style.overflow = 'hidden';
            contenedorMensaje.classList.remove('hidden');

            showActions( tituloSeccion );
            
        })
    })
    
    const showActions = (section) => {
    
        // Actualizar el título con la sección seleccionada
        document.getElementById('titulo-seccion').innerText = tituloSeccion;
    
        // Actualizar los enlaces dinámicamente
        // document.getElementById('crear-link').href = `/${section}/ventas`;
        // document.getElementById('agregar-link').href = `/${section}/compras`;
        // document.getElementById('listar-link').href = `/${section}`;
    }
    
    document.querySelector('.exit').addEventListener('click', () => {
        contenedorMensaje.classList.add('hidden');
        view.style.overflow = 'auto';
    })
})
