<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventario PDF</title>

        <link rel="stylesheet" href="{{ public_path('css/pdf-style.css')}}">
    </head>
<body>
    
    <div class="container">
        
        <div class="warehouse-info">
            <h1 class="text-base">Control de inventario</h1>
            <div class="header">
                <p>
                    <strong>Almacén: </strong>
                    {{ $almacen->nombre }}
                </p>
                
                <p>
                    <strong>Ubicacion: </strong>
                    {{ $almacen->ubicacion }}
                </p>
    
                <p>
                    <strong>Responsable: </strong>
                    {{ $almacen->empleado ? $almacen->empleado->nombre_completo : 'Sin responsable' }}
                </p>
            </div>
        </div>

        <div class="productos">
            <div class="header-productos">
                <p>Producto</p>
                <p>P.U</p>
                <p>SKU</p>
                <p>Stock</p>
                <p>Estado</p>
            </div>

            <div class="detalle-container">
                @foreach($almacen->productos as $producto)
                @php
                    $stock = $producto->pivot->stock;
                    if ($stock <= 0) {
                        $texto = 'Sin Stock';
                    } elseif ($stock <= 20) {
                        $texto = 'Stock bajo';
                    } else {
                        $texto = 'En Stock';
                    }
                @endphp
                    <div class="detalle-prod">
                        <p>{{ $producto->nombre }}</p>
                        <p>{{ $producto->pivot->precio_compra }}€</p>
                        <p>{{ $producto->codigo }}</p>
                        <p>{{ $stock }}uds.</p>
                        <p>{{ $texto }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
</body>
</html>