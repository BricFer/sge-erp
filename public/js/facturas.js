const descuento = document.querySelector('#porcentaje_descuento');
const almacenes = document.querySelector('#almacenes');
const detalle = document.querySelector('#detalles');
const contenedorSubtotal = document.querySelector('#monto_subtotal');
const contenedorDescuento = document.querySelector('#monto_descuento');
const contenedorIva = document.querySelector('#monto_iva');
const contenedorTotal = document.querySelector('#monto_total');
const agregarDetalle = document.querySelector('#agregar-detalle');
const clientes = document.getElementById('clientes');
const proveedores = document.getElementById('proveedores');

// Esta variable controlará el número de líneas detalle que tiene la factura
let numLinea = 0;

// Al cargar la página de crear factura, se recorrerrán las filas que hay en detalle-row para contarlas y almacenarlo en la variable
document.addEventListener('DOMContentLoaded', () => {
    detalle.querySelectorAll('.detalle-row').forEach( row => {
        numLinea++;
    })
})

const parseJSON = ( elem ) => {

    const elemSeleccionado = elem.options[elem.selectedIndex];

    const data = elemSeleccionado.getAttribute("data-info");

    try {
        return JSON.parse(data);
    } catch (error) {
        console.error("Error al parsear JSON:", error);
        return null;
    }
};

const setTextContent = (id, value) => {
    const elem = document.getElementById(id);
    if (elem) elem.textContent = value ?? "";
};

// AUTOCOMPLETADO
// Función que me autocompleta los campos relacionados con el cliente/proveedor dependiendo de la selección que se realice desde el menú desplegable
const autocompletarInputs = ( elem ) => {

    const socioComercial = parseJSON( elem );

    if( proveedores) {
        
        setTextContent('id_proveedor', socioComercial.id);
        setTextContent('cif', socioComercial.cif);
    }
    
    if( clientes ) {
        
        setTextContent('id_cliente', socioComercial.id);
        setTextContent('cif', socioComercial.nif);
    }
    
    setTextContent('razon_social', socioComercial.razon_social);
    setTextContent('domicilio', socioComercial.domicilio);
    setTextContent('poblacion', socioComercial.poblacion);
    setTextContent('provincia', socioComercial.provincia);
    setTextContent('cod_postal', socioComercial.cod_postal);    
}

// Función que autocompleta los campos relacionados con el empleado en base a la selección que se realiza desde el menú desplegable, los campos aparecen completados por defecto en base al usuario que ha iniciado sesión. Sin embargo, si se trata de un TL o superior podrá asignar una factura a si mismx o a otrx empleadx y es cuando se ejecuta autocompletarDatosEmpleados()
const autocompletarDatosEmpleados = ( elem ) => {

    const empleado = parseJSON(elem);
    
    setTextContent('id_empleado', empleado.legajo);
    setTextContent('dni_nif_empleado', empleado.dni_nif);
    setTextContent('cargo_empleado', empleado.cargo);
}

// Función que autocompleta los campos de 'detalle factura' en base al producto que se selecciona en el menú desplegable
const completarDetalleFactura = ( selectElement ) => {

    const detalleRow = selectElement.closest('.detalle-row');

    if( !detalleRow ) return;
    
    const producto = parseJSON(selectElement);

    detalleRow.querySelector('.codigo').value = producto.codigo || "";
    detalleRow.querySelector('.iva').value = producto.iva || "";

    if( clientes ) detalleRow.querySelector('.precio').value = producto.precio_venta || "";
}

// Función que calcula los importes de descuento, subtotal y total por linea de detalle
const calculoTotalesRow = ( htmlElement ) => {
    const cantidadRow = Number(htmlElement.querySelector('.cantidad')?.value) || 0;
    const ivaRow = Number(htmlElement.querySelector('.iva')?.value) || 0;
    const precioRow = Number(htmlElement.querySelector('.precio')?.value) || 0;

    const descuentoRow = htmlElement.querySelector('.descuento');
    const subtotalRow = htmlElement.querySelector('.subtotal');

    descuentoRow.value = (cantidadRow * precioRow * (Number(descuento.value)/100)).toFixed(2);

    subtotalRow.value = ((cantidadRow * precioRow - Number(descuentoRow.value)) * (1 + ivaRow/100)).toFixed(2);
}

// esta función se encarga de calcular los montos totales globales de: Subtotal, Descuento, IVA y el total de la factura
const calcularTotales = () => {
    let subtotal = 0;
    let totalDescuento = 0;
    let totalIva = 0;

    document.querySelectorAll(".detalle-row").forEach(row => {
        
        const precio = Number(row.querySelector(".precio")?.value) || 0;
        const cantidad = Number(row.querySelector(".cantidad")?.value) || 0;
        const iva = Number(row.querySelector(".iva")?.value) || 0;
        const descuentoDetalle = Number(descuento.value) || Number(row.querySelector(".descuento")?.value) || 0;

        let rowDescuento = (cantidad * precio * descuentoDetalle) / 100;
        let rowIva = ((cantidad * precio - rowDescuento) * iva) / 100;
        
        subtotal += cantidad * precio;
        totalDescuento += rowDescuento;
        totalIva += rowIva;
    });

    // Actualizar valores en la vista
    contenedorSubtotal.value = subtotal.toFixed(2);
    contenedorDescuento.value = totalDescuento.toFixed(2);
    contenedorIva.value = totalIva.toFixed(2);
    contenedorTotal.value = (subtotal - totalDescuento + totalIva).toFixed(2);
};

const obtenerDatosProductos = () => {

    let options = '';

    const { productos } = parseJSON( almacenes );
    
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
                class="text-black"
                data-info='${JSON.stringify(producto)}'
                value="${producto.id}"
                ${haveStock}
            >
                ${ producto.nombre } - ${ mensajeStock }
            </option>`;
        
        options += elementoHTML;                
        });
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
                class="text-black"
                disabled
                selected
            >
                Lista productos
            </option>
            ${ opcionesProductos }
        `);
    });
}

const eliminarRow = ( elem ) => {
    elem.parentElement.remove();
    reordenarLineasDetalle();
    calcularTotales();
}

// Reestable la numeración de detalle-row para mantener un orden en el número de líneas
const reordenarLineasDetalle = () => {
    numLinea = 0;

    const filas = document.querySelectorAll('.detalle-row');

    filas.forEach(( row ) => {

        const inputLinea = row.querySelector('input[name="num_linea[]"]');
        
        if (inputLinea) {
            numLinea++
            inputLinea.value = numLinea;
        }
    });
};

const agregarLineaDetalle = () => {
    const opcionesProductos = obtenerDatosProductos();

    detalle.insertAdjacentHTML('beforeend', `
        <div id="detalle-row-${numLinea}" class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">

            <input
                type="number"
                name="num_linea[]"
                id="num_linea"
                class="border-none p-0 w-[50px] bg-transparent"
                value="${numLinea}"
            />

            <select
                name="id_producto[]"
                onchange="completarDetalleFactura(this)"
                class="productos w-[295px] border-none p-0 bg-transparent"
            >
                <option
                    class="text-black"
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
                class="codigo w-[175px] border-none p-0 bg-transparent"
                readonly
            />

            <input
                type="number"
                name="cantidad[]"
                placeholder="Cant."
                min="1"
                max="99"
                class="cantidad calcularSubtotal w-[75px] border-none p-0 bg-transparent"
            />

            <input
                type="number"
                name="iva[]"
                placeholder="%IVA"
                min="0"
                max="99"
                class="iva calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                readonly
            />

            <input
                type="text"
                placeholder="P.U"
                name="precio[]"
                class="precio calcularSubtotal w-[75px] border-none p-0 bg-transparent"
            />

            <input
                type="text"
                name="descuento[]"
                placeholder="Descuento"
                class="descuento calcularSubtotal w-[75px] border-none p-0 bg-transparent"
                readonly
            />
            
            <input
                type="text"
                name="subtotal[]"
                placeholder="Subtotal"
                class="subtotal w-[95px] border-none p-0 bg-transparent"
            />

            <img
                src="../assets/icons/trash-icon.svg"
                class="eliminar-detalle w-[24px] h-[24px] rounded-lg cursor-pointer"
                onclick="eliminarRow(this)"
            >
        </div>
    `);
}

agregarDetalle.addEventListener('click', () => {
    numLinea++;
    agregarLineaDetalle();
});

// Evento que me añade una nueva línea de detalle si el usuario pulsa la tecla hacia abajo
detalle.addEventListener('keydown', ({ keyCode }) => {

    if( keyCode === 40 ) {
        numLinea++;

        agregarLineaDetalle();
    }
});

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