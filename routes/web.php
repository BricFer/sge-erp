<?php

use App\Http\Controllers\ProfileController;

use App\Livewire\Clientes\ListarClientes;
use App\Http\Controllers\ClienteController;

use App\Livewire\Empleados\ListarEmpleados;
use App\Http\Controllers\EmpleadoController;

use App\Livewire\Productos\ListarProductos;
use App\Http\Controllers\ProductoController;

use App\Livewire\Proveedores\ListarProveedores;
use App\Http\Controllers\ProveedorController;

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Clientes
Route::get('/clientes', ListarClientes::class)->name('cliente.home');

Route::get('/cliente/crear', [ClienteController::class, 'create'])-> name('cliente.crear');
Route::post('/cliente/guardar',[ClienteController::class, 'store'])-> name('cliente.store');

Route::get('/cliente/edit/{cliente}',[ClienteController::class,'edit'])->name('cliente.edit');
Route::put('/cliente/update/{cliente}',[ClienteController::class, 'update'])-> name('cliente.update');

Route::delete('cliente/destroy/{cliente}',[ClienteController::class, 'destroy'])->name('cliente.destroy');

// Proveedores
Route::get('/proveedores', ListarProveedores::class)->name('proveedor.home');

Route::get('/proveedor/crear', [ProveedorController::class, 'create'])-> name('proveedor.crear');
Route::post('/proveedor/guardar',[ProveedorController::class, 'store'])-> name('proveedor.store');

Route::get('/proveedor/edit/{proveedor}',[ProveedorController::class,'edit'])->name('proveedor.edit');
Route::put('/proveedor/update/{proveedor}',[ProveedorController::class, 'update'])-> name('proveedor.update');

Route::delete('proveedor/destroy/{proveedor}',[ProveedorController::class, 'destroy'])->name('proveedor.destroy');

// Productos
Route::get('/productos', ListarProductos::class)->name('producto.home');

Route::get('/producto/crear', [ProductoController::class, 'create'])-> name('producto.crear');
Route::post('/producto/guardar',[ProductoController::class, 'store'])-> name('producto.store');

Route::get('/producto/edit/{producto}',[ProductoController::class,'edit'])->name('producto.edit');
Route::put('/producto/update/{producto}',[ProductoController::class, 'update'])-> name('producto.update');

Route::delete('producto/destroy/{producto}',[ProductoController::class, 'destroy'])->name('producto.destroy');

// Empleados
Route::get('/empleados', ListarEmpleados::class)->name('empleado.home');

Route::get('/empleado/crear', [EmpleadoController::class, 'create'])-> name('empleado.crear');
Route::post('/empleado/guardar',[EmpleadoController::class, 'store'])-> name('empleado.store');

Route::get('/empleado/edit/{empleado}',[EmpleadoController::class,'edit'])->name('empleado.edit');
Route::put('/empleado/update/{empleado}',[EmpleadoController::class, 'update'])-> name('empleado.update');

Route::delete('empleado/destroy/{empleado}',[EmpleadoController::class, 'destroy'])->name('empleado.destroy');

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
