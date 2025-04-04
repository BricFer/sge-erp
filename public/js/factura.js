const descuento = document.querySelector('#descuento_general');
const detalle = document.querySelector('#detalles');
const contenedorSubtotal = document.querySelector('#monto_subtotal');
const contenedorDescuento = document.querySelector('#monto_descuento');
const contenedorIva = document.querySelector('#monto_iva');
const contenedorTotal = document.querySelector('#total');

// Variables de almacenamiento de los importes de subtotal, descuento e iva
let importeSubtotal;
let importeDescuento;
let importeIva;
let importeTotal;

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

    } catch (error) {
        console.error("Error al parsear JSON:", error);
    }
}

const autocompletarDatosEmpleados = () => {

    const listaEmpleados = document.getElementById("empleados");

    const empleadoSeleccionado = listaEmpleados.options[listaEmpleados.selectedIndex];

    const empleadoData = empleadoSeleccionado.getAttribute("data-info");

    try {
        const empleado = JSON.parse(empleadoData);

        console.log(empleado);
        
        document.getElementById("id_empleado").textContent = empleado.id || "";
        document.getElementById("dni_nif_empleado").textContent = empleado.dni_nif || "";
        
        document.getElementById("cargo_empleado").textContent = empleado.cargo || "";

    } catch (error) {
        console.error("Error al parsear JSON:", error);
    }
}

const completarDetalleFactura = ( selectElement ) => {

    const detalleRow = selectElement.closest('.detalle-row');

    if( !detalleRow ) return;

    const productoSeleccionado = selectElement.options[selectElement.selectedIndex];

    const productoData = productoSeleccionado.getAttribute("data-info");

    try {

        const producto = JSON.parse(productoData);

        detalleRow.querySelector('.codigo').value = producto.codigo || "";

        detalleRow.querySelector('.descripcion').value = producto.descripcion || "";

        detalleRow.querySelector('.precio_venta').value = producto.precio_venta || "";
        
        detalleRow.querySelector('.descuento').value = descuento.value || "";

    } catch ( error ) {
        console.error("Error al parsear el JSON:", error);
    }
}

document.querySelector('#detalles').addEventListener('input', ( event ) =>  {
    
    const hasChild = event.target.classList.contains("calcularSubtotal");

    if( hasChild ) {

        document.querySelectorAll('.detalle-row').forEach(row => {

            const precio = Number(row.querySelector('.precio_venta')?.value) || 0;

            const descuentoDetalle = Number(descuento.value) || Number(row.querySelector('.descuento')?.value) || 0;
            
            const cantidad = Number(row.querySelector('.cantidad')?.value) || 0;

            const iva = Number(row.querySelector('.iva')?.value) || 0;

            let subtotal = (cantidad * precio) * (1 + iva/100);

            if( descuentoDetalle > 0 ) {
                subtotal *= (100 - descuentoDetalle) / 100;
            }
            // Por cada row almacenamos los valores en las variables de total, subtotal, descuento e iva
            
            row.querySelector('.subtotal').value = subtotal.toFixed(2);
        });

        calcularTotales();
    }
})

descuento.addEventListener('input', () => {
    document.querySelectorAll('.descuento').forEach( (producto) => {
        producto.value = descuento.value;

        calcularTotales();
    })
})

detalle.addEventListener('keydown', ({ keyCode }) => {
    
    if( keyCode === 40 ) {
        
        let options = productosArray.map( ( producto ) => `
            <option
                value="${producto.id}"
                data-info='${JSON.stringify(producto)}'
            >
                ${producto.nombre}
            </option>
        `).join("");

        detalle.insertAdjacentHTML('beforeend', `
            <div class="detalle-row w-full flex flex-row justify-between items-center py-2 px-4 m-0">
                <select
                    name="id_producto[]"
                    onchange="completarDetalleFactura(this)"
                    class="w-[295px] border-none p-0"
                >
                    <option
                        disabled
                        selected
                    >
                        Lista productos
                    </option>

                    ${options}
                </select>

                <input
                    type="text"
                    placeholder="Código producto"
                    class="codigo w-[175px] border-none p-0"
                />

                <input
                    type="text"
                    placeholder="Descripcion"
                    class="descripcion w-[325px] border-none p-0"
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
                />

                <input
                    type="text"
                    placeholder="P.V"
                    name="precio[]"
                    class="precio_venta w-[75px] border-none p-0"
                />

                <input
                    type="text"
                    name="descuento[]"
                    placeholder="%"
                    value="${descuento.value}"
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
