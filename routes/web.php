<?php

use Illuminate\Support\Facades\Route;

// Cargar las importaciones desde el archivo barril (imports.php)
$imports = require app_path('Http/imports.php');

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Almacenes
Route::prefix('almacen')->name('almacen.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarAlmacenes'])->name('home');
    Route::get('/grid', $imports['ListarAlmacenesGrid'])->name('grid');
    Route::get('/{almacen}/productos', [$imports['AlmacenController'], 'listarAlmacen'])->name('productos');
    
    Route::get('/crear', [$imports['AlmacenController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['AlmacenController'], 'store'])->name('store');
    
    Route::get('/edit/{almacen}', [$imports['AlmacenController'], 'edit'])->name('edit');
    Route::put('/update/{almacen}', [$imports['AlmacenController'], 'update'])->name('update');
    
    Route::delete('/destroy/{almacen}', [$imports['AlmacenController'], 'destroy'])->name('destroy');
});

// Clientes
Route::prefix('cliente')->name('cliente.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarClientes'])->name('home');
    Route::get('/grid', $imports['ListarClientesGrid'])->name('grid');
    Route::get('/mostrar/{cliente}', [$imports['ClienteController'], 'showClient'])->name('show');
    Route::get('/buscar', [$imports['ClienteController'], 'buscar'])->name('buscar');
    
    Route::get('/crear', [$imports['ClienteController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['ClienteController'], 'store'])->name('store');
    
    Route::get('/edit/{cliente}', [$imports['ClienteController'], 'edit'])->name('edit');
    Route::put('/update/{cliente}', [$imports['ClienteController'], 'update'])->name('update');
    
    Route::delete('/destroy/{cliente}', [$imports['ClienteController'], 'destroy'])->name('destroy');
});

// Empleados
Route::prefix('empleado')->name('empleado.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarEmpleados'])->name('home');
    Route::get('/grid', $imports['ListarEmpleadosGrid'])->name('grid');
    Route::get('/mostrar/{empleado}', [$imports['EmpleadoController'], 'showEmployee'])->name('show');
    
    Route::get('/crear', [$imports['EmpleadoController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['EmpleadoController'], 'store'])->name('store');
    
    Route::get('/edit/{empleado}', [$imports['EmpleadoController'], 'edit'])->name('edit');
    Route::put('/update/{empleado}', [$imports['EmpleadoController'], 'update'])->name('update');
    
    Route::delete('/destroy/{empleado}', [$imports['EmpleadoController'], 'destroy'])->name('destroy');
});

// Productos
Route::prefix('producto')->name('producto.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarProductos'])->name('home');
    Route::get('/grid', $imports['ListarProductosGrid'])->name('grid');
    Route::get('/mostrar/{producto}', [$imports['ProductoController'], 'showProduct'])->name('show');
    
    Route::get('/crear', [$imports['ProductoController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['ProductoController'], 'store'])->name('store');
    
    Route::get('/edit/{producto}', [$imports['ProductoController'], 'edit'])->name('edit');
    Route::put('/update/{producto}', [$imports['ProductoController'], 'update'])->name('update');
    
    Route::delete('/destroy/{producto}', [$imports['ProductoController'], 'destroy'])->name('destroy');
});

// Proveedores
Route::prefix('proveedor')->name('proveedor.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarProveedores'])->name('home');
    Route::get('/grid', $imports['ListarProveedoresGrid'])->name('grid');
    Route::get('/mostrar/{proveedor}', [$imports['ProveedorController'], 'showSupplier'])->name('show');
    
    Route::get('/crear', [$imports['ProveedorController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['ProveedorController'], 'store'])->name('store');
    
    Route::get('/edit/{proveedor}', [$imports['ProveedorController'], 'edit'])->name('edit');
    Route::put('/update/{proveedor}', [$imports['ProveedorController'], 'update'])->name('update');
    
    Route::delete('/destroy/{proveedor}', [$imports['ProveedorController'], 'destroy'])->name('destroy');
});

// Servicios
Route::prefix('servicio')->name('servicio.')->group(function () use ($imports) {
    Route::get('/', $imports['ListarServicios'])->name('home');
    Route::get('/grid', $imports['ListarServiciosGrid'])->name('grid');
    Route::get('/mostrar/{servicio}', [$imports['ServicioController'], 'showSupplier'])->name('show');
    
    Route::get('/crear', [$imports['ServicioController'], 'create'])->name('crear');
    Route::post('/guardar', [$imports['ServicioController'], 'store'])->name('store');
    
    Route::get('/edit/{servicio}', [$imports['ServicioController'], 'edit'])->name('edit');
    Route::put('/update/{servicio}', [$imports['ServicioController'], 'update'])->name('update');
    
    Route::delete('/destroy/{servicio}', [$imports['ServicioController'], 'destroy'])->name('destroy');
});