const descuento = document.querySelector('#porcentaje_descuento');
const almacenes = document.querySelector('#almacenes');
const detalle = document.querySelector('#detalles');
const contenedorSubtotal = document.querySelector('#monto_subtotal');
const contenedorDescuento = document.querySelector('#monto_descuento');
const contenedorIva = document.querySelector('#monto_iva');
const contenedorTotal = document.querySelector('#monto_total');

// Variables de almacenamiento de los importes de subtotal, descuento e iva
let importeSubtotal;
let importeDescuento;
let importeIva;
let importeTotal;

// Esta variable controlará el número de líneas detalle que tiene la factura
let numLinea= 0;

// Al cargar la página de crear factura, se recorrerrán las filas que hay en detalle-row para contarlas y almacenarlo en la variable
document.addEventListener('DOMContentLoaded', () => {
    detalle.querySelectorAll('.detalle-row').forEach( row => {
        numLinea++;
    })
})

// Función que me autocompleta los campos relacionados con el cliente dependiendo de la selección que se realice desde el menú desplegable
const autocompletarInputs = () => {

    const listaClientes = document.getElementById("clientes");

    const clienteSeleccionado = listaClientes.options[listaClientes.selectedIndex];

    const clienteData = clienteSeleccionado.getAttribute("data-info");

    try {
        const cliente = JSON.parse(clienteData);

        document.getElementById("id_cliente").textContent = cliente.id || "";
        document.getElementById("dni_nif").textContent = cliente.nif || "";
        document.getElementById("razon_social").textContent = cliente.razon_social || "";
        document.getElementById("domicilio").textContent = cliente.domicilio || "";
        document.getElementById("poblacion").textContent = cliente.poblacion || "";
        document.getElementById("provincia").textContent = cliente.provincia || "";
        document.getElementById("cod_postal").textContent = cliente.cod_postal || "";
        
        document.getElementById("facturable_type").value = cliente.facturable_type || "";

    } catch (error) {
        console.error("Error al parsear JSON:", error);
    }
}

// Función que autocompleta los campos relacionados con el empleado en base a la selección que se realiza desde el menú desplegable, los campos aparecen completados por defecto en base al usuario que ha iniciado sesión. Sin embargo, si se trata de un TL o superior podrá asignar una factura a si mismx o a otrx empleadx y es cuando se ejecuta autocompletarDatosEmpleados()
const autocompletarDatosEmpleados = () => {

    const listaEmpleados = document.getElementById("empleados");

    const empleadoSeleccionado = listaEmpleados.options[listaEmpleados.selectedIndex];

    const empleadoData = empleadoSeleccionado.getAttribute("data-info");

    try {
        const empleado = JSON.parse(empleadoData);
        
        document.getElementById("id_empleado").textContent = empleado.legajo || "";
        document.getElementById("dni_nif_empleado").textContent = empleado.dni_nif || "";
        
        document.getElementById("cargo_empleado").textContent = empleado.cargo || "";

    } catch (error) {
        console.error("Error al parsear JSON:", error);
    }
}

// Función que autocompleta los campos de 'detalle factura' en base al producto que se selecciona en el menú desplegable
const completarDetalleFactura = ( selectElement ) => {

    const detalleRow = selectElement.closest('.detalle-row');

    if( !detalleRow ) return;

    const productoSeleccionado = selectElement.options[selectElement.selectedIndex];

    const productoData = productoSeleccionado.getAttribute("data-info");

    try {
        
        const producto = JSON.parse(productoData);

        detalleRow.querySelector('.codigo').value = producto.codigo || "";

        detalleRow.querySelector('.precio_venta').value = producto.precio_venta || "";
        
        detalleRow.querySelector('.iva').value = producto.iva || "";

    } catch ( error ) {
        console.error("Error al parsear el JSON:", error);
    }
}

// Función que calcula los importes de descuento, subtotal y total por linea de detalle
const calculoTotalesRow = ( htmlElement ) => {
    const cantidadRow = Number(htmlElement.querySelector('.cantidad')?.value) || 0;
    const ivaRow = Number(htmlElement.querySelector('.iva')?.value) || 0;
    const precioVentaRow = Number(htmlElement.querySelector('.precio_venta')?.value) || 0;

    const descuentoRow = htmlElement.querySelector('.descuento');
    const subtotalRow = htmlElement.querySelector('.subtotal');

    descuentoRow.value = (cantidadRow * precioVentaRow * (Number(descuento.value)/100)).toFixed(2);

    subtotalRow.value = ((cantidadRow * precioVentaRow - Number(descuentoRow.value)) * (1 + ivaRow/100)).toFixed(2);
}

// esta función se encarga de calcular los montos totales globales de: Subtotal, Descuento, IVA y el total de la factura
const calcularTotales = () => {
    let subtotal = 0;
    let totalDescuento = 0;
    let totalIva = 0;

    document.querySelectorAll(".detalle-row").forEach(row => {
        const precio = Number(row.querySelector(".precio_venta")?.value) || 0;
        const cantidad = Number(row.querySelector(".cantidad")?.value) || 0;
        const iva = Number(row.querySelector(".iva")?.value) || 0;
        const descuentoDetalle = Number(descuento.value) || Number(row.querySelector(".descuento")?.value) || 0;

        let rowSubtotal = cantidad * precio;
        let rowDescuento = (rowSubtotal * descuentoDetalle) / 100;
        let rowIva = ((rowSubtotal - rowDescuento) * iva) / 100;
        
        subtotal += rowSubtotal;
        totalDescuento += rowDescuento;
        totalIva += rowIva;
    });

    importeSubtotal = subtotal;
    importeDescuento = totalDescuento;
    importeIva = totalIva;
    importeTotal = subtotal - totalDescuento + totalIva;

    // Actualizar valores en la vista
    contenedorSubtotal.value = importeSubtotal.toFixed(2);
    contenedorDescuento.value = importeDescuento.toFixed(2);
    contenedorIva.value = importeIva.toFixed(2);
    contenedorTotal.value = importeTotal.toFixed(2);
};

const obtenerDatosProductos = () => {
    
    const almacenSeleccionado = almacenes.options[almacenes.selectedIndex];
    const productoData = almacenSeleccionado.getAttribute('data-info');

    let options = '';

    try {
        const { productos } = JSON.parse( productoData );
        
        // Recorremos el array de productos y los vamos 'dibujando'
        productos.forEach( ( producto ) => {
            
            // Del data-info del almacen se extrae la información asociada a este. Sin embargo, la información está organizada en arrays (productos) y objetos (pivot). Por lo que hay que ir extrayendo la información para poder manejarla y mostrarla

            // Pivot hace referencia a la tabla pivote, por lo que allí esta almacenada la información de stock
            const { pivot } = producto;
    
            const haveStock = pivot.stock === 0 ? 'disabled' : '';
            const mensajeStock = pivot.stock === 0 ? 'Sin stock' : pivot.stock;                

            // Al elementoHTML le pasamos un JSON en el data-info de lo contrario solo estaría pasando un [object Object] y no podría leer la información para procesarla en cada detalle-row
            const elementoHTML = `
                <option
                    data-info='${JSON.stringify(producto)}'
                    value="${producto.id}"
                    ${haveStock}
                >
                    ${ producto.nombre } - ${ mensajeStock }
                </option>`;
            
            options += elementoHTML;                
        });

    } catch (error) {
        console.error("Error al parsear el JSON:", error);
    }
    return options;
}

// Función que mostrará los 'productos' del almacén que se ha seleccionado
const completarProductos = () => {

    // Recorremos cada línea de detalle (detalle-row) para ir dibujando los productos en cada select
    detalle.querySelectorAll('.detalle-row').forEach( row => {

        const opcionesProductos = obtenerDatosProductos();

        // Reestablezco el contenido del select.productos de lo contrario cada vez que cambie de almacen estaré haciendo un append
        row.querySelector('.productos').innerHTML = '';

        // Dibujo nuevamente el contenido del select.productos añadiendo los productos
        row.querySelector('.productos').insertAdjacentHTML('beforeend', `
            <option
                disabled
                selected
            >
                Lista productos
            </option>
            ${ opcionesProductos }
        `);
    });
}

// Evento que me añade una nueva línea de detalle si el usuario pulsa la tecla hacia abajo
detalle.addEventListener('keydown', ({ keyCode }) => {
    
    const opcionesProductos = obtenerDatosProductos();

    if( keyCode === 40 ) {
        numLinea++;

        detalle.insertAdjacentHTML('beforeend', `
            <div class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">

                <input
                    type="number"
                    name="num_linea[]"
                    id="num_linea"
                    class="border-none p-0 w-[50px]"
                    value="${numLinea}"
                />

                <select
                    name="id_producto[]"
                    onchange="completarDetalleFactura(this)"
                    class="productos w-[295px] border-none p-0"
                >
                    <option
                        disabled
                        selected
                    >
                        Lista productos
                    </option>
                    ${ opcionesProductos }
                </select>

                <input
                    type="text"
                    placeholder="Código producto"
                    class="codigo w-[175px] border-none p-0"
                    readonly
                />

                <input
                    type="number"
                    name="cantidad[]"
                    placeholder="Cant."
                    min="1"
                    max="99"
                    class="cantidad calcularSubtotal w-[75px] border-none p-0"
                />

                <input
                    type="number"
                    name="iva[]"
                    placeholder="%IVA"
                    min="0"
                    max="99"
                    class="iva calcularSubtotal w-[75px] border-none p-0"
                    readonly
                />

                <input
                    type="text"
                    placeholder="P.V"
                    name="precio[]"
                    class="precio_venta w-[75px] border-none p-0"
                    readonly
                />

                <input
                    type="text"
                    name="descuento[]"
                    placeholder="Descuento"
                    class="descuento calcularSubtotal w-[75px] border-none p-0"
                    readonly
                />
                
                <input
                    type="text"
                    name="subtotal[]"
                    placeholder="Subtotal"
                    class="subtotal w-[95px] border-none p-0"
                />
            </div>
        `);
    }
})

// Evento que hará el calculo de los campos descuento, subtotal y total de cada detalle-row a medida que se vaya ingresando información
detalle.addEventListener('input', ( event ) =>  {
    
    const hasChild = event.target.classList.contains("calcularSubtotal");

    if( hasChild ) {

        document.querySelectorAll('.detalle-row').forEach( row => {

            calculoTotalesRow( row );
        });

        calcularTotales();
    }
})

// Evento que recalcula los valores de los campos descuento, subtotal y total de cada detalle-row en caso de que el descuento se modifique.
descuento.addEventListener('input', () => {

    detalle.querySelectorAll('.detalle-row').forEach( ( row ) => {

        calculoTotalesRow(row);
    });

    calcularTotales();

});