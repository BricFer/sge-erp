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
    // Rutas para las vistas que listan
    Route::prefix('almacen')
        ->middleware('warehouse')
        ->name('almacen.')
        ->group(function () use ($imports) {
            Route::get('/', $imports['ListarAlmacenes'])->name('home');
            Route::get('/grid', $imports['ListarAlmacenesGrid'])->name('grid');
    });

    // Rutas para realizar operaciones sobre los almacenes (crear, editar, eliminar)
    Route::prefix('almacen')
        ->middleware('warehouse')
        ->name('almacen.')
        ->group(function () use ($imports) {
            Route::get('/{almacen}/productos', [$imports['AlmacenController'], 'listarAlmacen'])->name('productos');
            
            Route::get('/inventario/{almacen}/productos', [$imports['AlmacenController'], 'listarInventario'])->name('inventario');
            
            Route::get('/crear', [$imports['AlmacenController'], 'create'])->name('crear');
            Route::post('/guardar', [$imports['AlmacenController'], 'store'])->name('store');
            
            Route::get('/edit/{almacen}', [$imports['AlmacenController'], 'edit'])->name('edit');
            Route::put('/update/{almacen}', [$imports['AlmacenController'], 'update'])->name('update');
            Route::put('/{almacen}/productos/{producto}', [$imports['AlmacenController'], 'actualizarStock'])->name('stock');
            
            Route::delete('/destroy/{almacen}', [$imports['AlmacenController'], 'destroy'])->name('destroy');

            Route::get('/{almacen}/pdf', [$imports['AlmacenController'], 'generarPDF'])->name('pdf');
    });
    
    // Clientes
    // Rutas para las vistas que listan
    Route::prefix('cliente')
        ->middleware('sales')
        ->name('cliente.')
        ->group(function () use ($imports) {
            Route::get('/', $imports['ListarClientes'])->name('home');
            Route::get('/grid', $imports['ListarClientesGrid'])->name('grid');
    });

    // Rutas para operar sobre los clientes (crear, editar, eliminar)
    Route::prefix('cliente')
        ->middleware('sales')
        ->name('cliente.')
        ->group(function () use ($imports) {
            Route::get('/mostrar/{cliente}', [$imports['ClienteController'], 'showClient'])->name('show');
            Route::get('/buscar', [$imports['ClienteController'], 'buscar'])->name('buscar');
            
            Route::get('/crear', [$imports['ClienteController'], 'create'])->name('crear');
            Route::post('/guardar', [$imports['ClienteController'], 'store'])->name('store');
            
            Route::get('/edit/{cliente}', [$imports['ClienteController'], 'edit'])->name('edit');
            Route::put('/update/{cliente}', [$imports['ClienteController'], 'update'])->name('update');
            
            Route::delete('/destroy/{cliente}', [$imports['ClienteController'], 'destroy'])->name('destroy');
    });
    
    // Empleados
    // A empleados solo pueden acceder los Admin o RRHH por eso no se separan
    Route::prefix('empleado')
        ->middleware('rrhh')
        ->name('empleado.')
        ->group(function () use ($imports) {
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
    // Rutas para las vistas que listan
    Route::prefix('factura')
        ->middleware('sales')
        ->name('factura.')
        ->group(function () use ($imports) {
        
            Route::get('/ventas', $imports['ListarFacturasVentas'])->name('ventas');
            Route::get('/ventas-grid', $imports['ListarFacturasGridVentas'])->name('ventasgrid');
    });

    // Rutas para realizar operaciones sobre las facturas de ventas (crear, eliminar)
    Route::prefix('factura')
        ->middleware('sales')
        ->name('factura.')
        ->group(function () use ($imports) {
        
            Route::get('/ventas/{factura}/productos', [$imports['FacturaController'], 'show'])->name('ventas.productos');
            
            Route::get('/crearventa', [$imports['FacturaController'], 'createSales'])->name('crear.ventas');
            
            Route::post('/guardar', [$imports['FacturaController'], 'store'])->name('store');
            Route::delete('/destroy/{factura}', [$imports['FacturaController'], 'destroy'])->name('destroy');
    });
    
    // Compras
    // Rutas para las vistas que listan
    Route::prefix('factura')
        ->middleware('purchases')
        ->name('factura.')
        ->group(function () use ($imports) {

            Route::get('/compras', $imports['ListarFacturasCompras'])->name('compras');
            Route::get('/compras-grid', $imports['ListarFacturasGridCompras'])->name('comprasgrid');
    });

    // Rutas para operar sobre las facturas de compras (crear, eliminar)
    Route::prefix('factura')
        ->middleware('purchases')
        ->name('factura.')
        ->group(function () use ($imports) {
        
            Route::get('/compras/{factura}/productos', [$imports['FacturaController'], 'show'])->name('compras.productos');    
            Route::get('/crearcompras', [$imports['FacturaController'], 'createPurchases'])->name('crear.compras');
            Route::post('/guardar', [$imports['FacturaController'], 'store'])->name('store');
            Route::delete('/destroy/{factura}', [$imports['FacturaController'], 'destroy'])->name('destroy');
    });

    // Productos
    // Rutas para las vistas que listan
    Route::prefix('producto')
        ->middleware('warehouse')
        ->name('producto.')
        ->group(function () use ($imports) {
            Route::get('/', $imports['ListarProductos'])->name('home');
            Route::get('/grid', $imports['ListarProductosGrid'])->name('grid');
    });

    // Rutas para operar sobre los productos (crear, editar, eliminar)
    Route::prefix('producto')
        ->middleware('warehouse')
        ->name('producto.')
        ->group(function () use ($imports) {
            Route::get('/{producto}/almacenes', [$imports['ProductoController'], 'listarProducto'])->name('almacenes');
            
            Route::get('/crear', [$imports['ProductoController'], 'create'])->name('crear');
            Route::post('/guardar', [$imports['ProductoController'], 'store'])->name('store');
            
            Route::get('/edit/{producto}', [$imports['ProductoController'], 'edit'])->name('edit');
            Route::put('/update/{producto}', [$imports['ProductoController'], 'update'])->name('update');
            
            Route::delete('/destroy/{producto}', [$imports['ProductoController'], 'destroy'])->name('destroy');
    });
    
    // Proveedores
    // Rutas para las vistas que listan
    Route::prefix('proveedor')
        ->middleware('purchases')
        ->name('proveedor.')
        ->group(function () use ($imports) {

            Route::get('/', $imports['ListarProveedores'])->name('home');
            Route::get('/grid', $imports['ListarProveedoresGrid'])->name('grid');
    });

    // Rutas para operar sobre los proveedores (crear, editar, eliminar)
    Route::prefix('proveedor')
        ->middleware('purchases')
        ->name('proveedor.')
        ->group(function () use ($imports) {
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