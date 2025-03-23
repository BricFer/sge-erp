const cantidad = document.querySelector('#cantidad');
const descuento = document.querySelector('#descuento');
const precio = document.querySelector('#precio_venta');

const autocompletarInputs = () => {

    const listaClientes = document.getElementById("clientes");

    const clienteSeleccionado = listaClientes.options[listaClientes.selectedIndex];

    const clienteData = clienteSeleccionado.getAttribute("data-info");

    try {
        const cliente = JSON.parse(clienteData);

        console.log(cliente);

        document.getElementById("id_cliente").value = cliente.id || "";
        document.getElementById("dni_nif").value = cliente.nif || "";
        document.getElementById("razon_social").value = cliente.razon_social || "";
        document.getElementById("domicilio").value = cliente.domicilio || "";
        document.getElementById("poblacion").value = cliente.poblacion || "";
        document.getElementById("provincia").value = cliente.provincia || "";
        document.getElementById("cod_postal").value = cliente.cod_postal || "";

    } catch (error) {
        console.error("Error al parsear JSON:", error);
    }
}

const completarDetalleFactura = () => {

    const listaProductos = document.querySelector('#productos');

    const productoSeleccionado = listaProductos.options[listaProductos.selectedIndex];

    const productoData = productoSeleccionado.getAttribute("data-info");

    try {

        const producto = JSON.parse(productoData);

        document.querySelector('#codigo').value = producto.codigo || "";

        document.querySelector('#descripcion').value = producto.descripcion || "";

        precio.value = producto.precio_venta || "";
        
        document.querySelector('#descuento_producto').value = descuento.value || "";

    } catch ( error ) {
        console.error("Error al parsear el JSON:", error);
    }
}

document.querySelectorAll('.calcularSubtotal').forEach( calcular => {

    calcular.addEventListener('focusout', () => {

        const precioProducto = Number(precio.value);
        const descuentoProducto = Number(descuento.value) || Number(document.querySelector('#descuento_producto').value);
        const cantidadProducto = Number(cantidad.value);

        document.querySelector('#subtotal').value = ( descuentoProducto > 0 ? cantidadProducto * precioProducto * (100 - descuentoProducto)/100 : cantidadProducto * precioProducto).toFixed(2);

    })
})

descuento.addEventListener('change', () => {
    document.querySelector('#descuento_producto').value = descuento.value;
})
