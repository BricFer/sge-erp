<?php

namespace App\Http;

// Importar todos los controladores
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServicioController;

// Importar todos los componentes Livewire
use App\Livewire\Almacenes\ListarAlmacenes;
use App\Livewire\Almacenes\ListarAlmacenesGrid;
use App\Livewire\Clientes\ListarClientes;
use App\Livewire\Clientes\ListarGrid;
use App\Livewire\Empleados\ListarEmpleados;
use App\Livewire\Empleados\ListarEmpleadosGrid;
use App\Livewire\Facturas\ListarFacturas;
use App\Livewire\Facturas\ListarFacturasGrid;
use App\Livewire\Productos\ListarProductos;
use App\Livewire\Productos\ListarProductosGrid;
use App\Livewire\Proveedores\ListarProveedores;
use App\Livewire\Proveedores\ListarProveedoresGrid;
use App\Livewire\Servicios\ListarServicios;
use App\Livewire\Servicios\ListarServiciosGrid;

return [
    'ProfileController' => ProfileController::class,
    'AlmacenController' => AlmacenController::class,
    'ClienteController' => ClienteController::class,
    'EmpleadoController' => EmpleadoController::class,
    'FacturaController' => FacturaController::class,
    'ProductoController' => ProductoController::class,
    'ProveedorController' => ProveedorController::class,
    'ServicioController' => ServicioController::class,

    'ListarAlmacenes' => ListarAlmacenes::class,
    'ListarAlmacenesGrid' => ListarAlmacenesGrid::class,
    'ListarClientes' => ListarClientes::class,
    'ListarClientesGrid' => ListarGrid::class,
    'ListarEmpleados' => ListarEmpleados::class,
    'ListarEmpleadosGrid' => ListarEmpleadosGrid::class,
    'ListarFacturas' => ListarFacturas::class,
    'ListarFacturasGrid' => ListarFacturasGrid::class,
    'ListarProductos' => ListarProductos::class,
    'ListarProductosGrid' => ListarProductosGrid::class,
    'ListarProveedores' => ListarProveedores::class,
    'ListarProveedoresGrid' => ListarProveedoresGrid::class,
    'ListarServicios' => ListarServicios::class,
    'ListarServiciosGrid' => ListarServiciosGrid::class,
];
