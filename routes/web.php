<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordChangeController;

require __DIR__.'/auth.php';

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Si se utiliza otra clase diferente de auth el valor que se le pasa al middleware sería, por ejemplo, 'auth:empleado'
Route::middleware('auth')->group(function () {
    // Cargar las importaciones desde el archivo barril (imports.php), se hace dentro del middleware para poder tener acceso al archivo, de lo contrario salta un error
    $imports = require app_path('Http/imports.php');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () use ($imports) {
        Route::get('/', [$imports['ProfileController'], 'show'])->name('show');
    });
    
    // Password
    Route::get('/password/editar', [PasswordChangeController::class, 'edit'])->name('password.editar');
    Route::post('/password/actualizar', [PasswordChangeController::class, 'update'])->name('password.actualizar');

    // Almacenes
    Route::prefix('almacen')->name('almacen.')->group(function () use ($imports) {
        Route::get('/', $imports['ListarAlmacenes'])->name('home');
        Route::get('/grid', $imports['ListarAlmacenesGrid'])->name('grid');
        Route::get('/{almacen}/productos', [$imports['AlmacenController'], 'listarAlmacen'])->name('productos');
        
        Route::get('/crear', [$imports['AlmacenController'], 'create'])->name('crear');
        Route::post('/guardar', [$imports['AlmacenController'], 'store'])->name('store');
        
        Route::get('/edit/{almacen}', [$imports['AlmacenController'], 'edit'])->name('edit');
        Route::put('/update/{almacen}', [$imports['AlmacenController'], 'update'])->name('update');
        Route::put('/{almacen}/productos/{producto}', [$imports['AlmacenController'], 'actualizarStock'])->name('stock');
        
        Route::delete('/destroy/{almacen}', [$imports['AlmacenController'], 'destroy'])->name('destroy');
    });
    
    // Rutas de clientes solo para verlos
    Route::prefix('cliente')
        ->middleware('sales_or_admin')
        ->name('cliente.')
        ->group(function () use ($imports) {
            Route::get('/', $imports['ListarClientes'])->name('home');
            Route::get('/grid', $imports['ListarClientesGrid'])->name('grid');
    });

    // Rutas para operar sobre los clientes (editar, eliminar)
    Route::prefix('cliente')->middleware('sales_or_admin')->name('cliente.')->group(function () use ($imports) {
        Route::get('/mostrar/{cliente}', [$imports['ClienteController'], 'showClient'])->name('show');
        Route::get('/buscar', [$imports['ClienteController'], 'buscar'])->name('buscar');
        
        Route::get('/crear', [$imports['ClienteController'], 'create'])->name('crear');
        Route::post('/guardar', [$imports['ClienteController'], 'store'])->name('store');
        
        Route::get('/edit/{cliente}', [$imports['ClienteController'], 'edit'])->name('edit');
        Route::put('/update/{cliente}', [$imports['ClienteController'], 'update'])->name('update');
        
        Route::delete('/destroy/{cliente}', [$imports['ClienteController'], 'destroy'])->name('destroy');
    });
    
    // Empleados
    Route::prefix('empleado')->middleware('rrhh_or_admin')->name('empleado.')->group(function () use ($imports) {
        Route::get('/', $imports['ListarEmpleados'])->name('home');
        Route::get('/grid', $imports['ListarEmpleadosGrid'])->name('grid');
        Route::get('/mostrar/{empleado}', [$imports['EmpleadoController'], 'showEmployee'])->name('show');
        
        Route::get('/crear', [$imports['EmpleadoController'], 'create'])->name('crear');
        Route::post('/guardar', [$imports['EmpleadoController'], 'store'])->name('store');
        
        Route::get('/edit/{empleado}', [$imports['EmpleadoController'], 'edit'])->name('edit');
        Route::put('/update/{empleado}', [$imports['EmpleadoController'], 'update'])->name('update');
        
        Route::delete('/destroy/{empleado}', [$imports['EmpleadoController'], 'destroy'])->name('destroy');
    });
    
    // Facturas
    // Ventas
    Route::prefix('factura')->middleware('sales_or_admin')->name('factura.')->group(function () use ($imports) {
        Route::get('/ventas', $imports['ListarFacturasVentas'])->name('ventas');
        
        Route::get('/ventas-grid', $imports['ListarFacturasGridVentas'])->name('ventasgrid');
        
        Route::get('/{factura}/productos', [$imports['FacturaController'], 'show'])->name('productos');
        
        Route::get('/crearventa', [$imports['FacturaController'], 'createSales'])->name('crear.ventas');
        
        Route::post('/guardar', [$imports['FacturaController'], 'store'])->name('store');
        Route::delete('/destroy/{factura}', [$imports['FacturaController'], 'destroy'])->name('destroy');
    });
    
    // Compras
    Route::prefix('factura')->name('factura.')->group(function () use ($imports) {
        
        Route::get('/compras', $imports['ListarFacturasCompras'])->name('compras');

        Route::get('/compras-grid', $imports['ListarFacturasGridCompras'])->name('comprasgrid');

        Route::get('/{factura}/productos', [$imports['FacturaController'], 'show'])->name('productos');
        
        Route::get('/crearcompras', [$imports['FacturaController'], 'createPurchases'])->name('crear.compras');
        
        Route::post('/guardar', [$imports['FacturaController'], 'store'])->name('store');
        Route::delete('/destroy/{factura}', [$imports['FacturaController'], 'destroy'])->name('destroy');
    });

    // Productos
    // Acceso solo para ver
    Route::prefix('producto')->middleware('sales_or_admin')->name('producto.')->group(function () use ($imports) {
        Route::get('/', $imports['ListarProductos'])->name('home');
        Route::get('/grid', $imports['ListarProductosGrid'])->name('grid');
    });

    // Rutas para operar sobre los clienttes (editar, eliminar)
    Route::prefix('producto')->name('producto.')->group(function () use ($imports) {
        Route::get('/{producto}/almacenes', [$imports['ProductoController'], 'listarProducto'])->name('almacenes');
        
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
});