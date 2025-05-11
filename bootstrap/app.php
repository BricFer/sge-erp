<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAccounting;
use App\Http\Middleware\CheckPurchaseAdmin;
use App\Http\Middleware\CheckRRHHAdmin;
use App\Http\Middleware\CheckSalesAdmin;
use App\Http\Middleware\CheckWarehouseAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => CheckAdmin::class,
            'rrhh' => CheckRRHHAdmin::class,
            'sales' => CheckSalesAdmin::class,
            'purchases' => CheckPurchaseAdmin::class,
            'warehouse' => CheckWarehouseAdmin::class,
            'accounting' => CheckAccounting::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
