<?php

use App\Http\Controllers\ProfileController;

use App\Livewire\Almacenes\ListarAlmacenes;
use App\Livewire\Almacenes\ListarAlmacenesGrid;
use App\Http\Controllers\AlmacenController;

use App\Livewire\Clientes\ListarClientes;
use App\Livewire\Clientes\ListarGrid;
use App\Http\Controllers\ClienteController;

use App\Livewire\Empleados\ListarEmpleados;
use App\Livewire\Empleados\ListarEmpleadosGrid;
use App\Http\Controllers\EmpleadoController;

use App\Livewire\Productos\ListarProductos;
use App\Livewire\Productos\ListarProductosGrid;
use App\Http\Controllers\ProductoController;

use App\Livewire\Proveedores\ListarProveedores;
use App\Livewire\Proveedores\ListarProveedoresGrid;
use App\Http\Controllers\ProveedorController;

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Almacenes
//Listar
Route::get('/almacenes', ListarAlmacenes::class)->name('almacen.home');
Route::get('/lalmacenes', ListarAlmacenesGrid::class)->name('almacen.grid');
Route::get('/almacen/mostar/{almacen}', [AlmacenController::class, 'showStorage'])->name('almacen.show');

// Crear/Guardar
Route::get('/almacen/crear', [AlmacenController::class, 'create'])-> name('almacen.crear');
Route::post('/almacen/guardar',[AlmacenController::class, 'store'])-> name('almacen.store');

// Modificar/Guardar
Route::get('/almacen/edit/{almacen}',[AlmacenController::class,'edit'])->name('almacen.edit');
Route::put('/almacen/update/{almacen}',[AlmacenController::class, 'update'])-> name('almacen.update');

// Eliminar
Route::delete('almacen/destroy/{almacen}',[AlmacenController::class, 'destroy'])->name('almacen.destroy');

// Clientes
//Listar
Route::get('/clientes', ListarClientes::class)->name('cliente.home');
Route::get('/lclientes', ListarGrid::class)->name('cliente.grid');
Route::get('/cliente/mostar/{cliente}', [ClienteController::class, 'showClient'])->name('cliente.show');
Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->name('cliente.buscar'); // Devuelve los clientes según la búsqueda

// Crear/Guardar
Route::get('/cliente/crear', [ClienteController::class, 'create'])-> name('cliente.crear');
Route::post('/cliente/guardar',[ClienteController::class, 'store'])-> name('cliente.store');

// Modificar/Guardar
Route::get('/cliente/edit/{cliente}',[ClienteController::class,'edit'])->name('cliente.edit');
Route::put('/cliente/update/{cliente}',[ClienteController::class, 'update'])-> name('cliente.update');

// Eliminar
Route::delete('cliente/destroy/{cliente}',[ClienteController::class, 'destroy'])->name('cliente.destroy');

// Empleados
//Listar
Route::get('/empleados', ListarEmpleados::class)->name('empleado.home');
Route::get('/lempleados', ListarEmpleadosGrid::class)->name('empleado.grid');
Route::get('/empleado/mostar/{empleado}', [EmpleadoController::class, 'showEmployee'])->name('empleado.show');

// Crear/Guardar
Route::get('/empleado/crear', [EmpleadoController::class, 'create'])-> name('empleado.crear');
Route::post('/empleado/guardar',[EmpleadoController::class, 'store'])-> name('empleado.store');

// Modificar/Guardar
Route::get('/empleado/edit/{empleado}',[EmpleadoController::class,'edit'])->name('empleado.edit');
Route::put('/empleado/update/{empleado}',[EmpleadoController::class, 'update'])-> name('empleado.update');

// Eliminar
Route::delete('empleado/destroy/{empleado}',[EmpleadoController::class, 'destroy'])->name('empleado.destroy');

// Productos
//Listar
Route::get('/productos', ListarProductos::class)->name('producto.home');
Route::get('/lproductos', ListarProductosGrid::class)->name('producto.grid');
Route::get('/producto/mostar/{producto}', [ProductoController::class, 'showProduct'])->name('producto.show');

// Crear/Guardar
Route::get('/producto/crear', [ProductoController::class, 'create'])-> name('producto.crear');
Route::post('/producto/guardar',[ProductoController::class, 'store'])-> name('producto.store');

// Modificar/Guardar
Route::get('/producto/edit/{producto}',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('/producto/update/{producto}',[ProductoController::class, 'update'])-> name('producto.update');

// Eliminar
Route::delete('producto/destroy/{producto}',[ProductoController::class, 'destroy'])->name('producto.destroy');

// Proveedores
//Listar
Route::get('/proveedores', ListarProveedores::class)->name('proveedor.home');
Route::get('/lproveedores', ListarProveedoresGrid::class)->name('proveedor.grid');
Route::get('/proveedor/mostar/{proveedor}', [ProveedorController::class, 'showSupplier'])->name('proveedor.show');

// Crear/Guardar
Route::get('/proveedor/crear', [ProveedorController::class, 'create'])-> name('proveedor.crear');
Route::post('/proveedor/guardar',[ProveedorController::class, 'store'])-> name('proveedor.store');

// Modificar/Guardar
Route::get('/proveedor/edit/{proveedor}',[ProveedorController::class,'edit'])->name('proveedor.edit');
Route::put('/proveedor/update/{proveedor}',[ProveedorController::class, 'update'])-> name('proveedor.update');

// Eliminar
Route::delete('proveedor/destroy/{proveedor}',[ProveedorController::class, 'destroy'])->name('proveedor.destroy');

// Facturas
// Route::get('/facturas', ListarClientes::class)->name('factura.home');

// Almacenes
// Route::get('/almacenes', ListarClientes::class)->name('almacen.home');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
