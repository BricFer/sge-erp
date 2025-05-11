<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventario PDF</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
            .warehouse-info {
                border: #000 solid .1rem;
                padding: 1.5rem;
                border-radius: 2rem;
            }
            .productos {
                margin-top: 3rem;
            }
            .header-productos p {
                font-weight: 600;
                display: inline-block;
            }
            .detalle-container {
                width: 100%;
            }
            .header-productos, .detalle-prod {
                width: 100%;
            }
            .detalle-prod p {
                display: inline-block;
            }
            .header-productos p:nth-child(1), .detalle-prod p:nth-child(1) {
                width: 215px;
            }
            .header-productos p:nth-child(2), .detalle-prod p:nth-child(2) {
                width: 115px;
            }
            .header-productos p:nth-child(3), .detalle-prod p:nth-child(3) {
                width: 175px;
            }
            .header-productos p:nth-child(4), .detalle-prod p:nth-child(4) {
                width: 95px;
            }
        </style>
    </head>
<body>
    
    <div class="container">
        <h2 class="text-base">Inventario</h2>

        <div class="warehouse-info">
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
                    {{ $almacen->empleados ? $almacen->empleados->nombre_completo : 'Sin responsable' }}
                </p>
            </div>
        </div>

        <div class="productos">
            <div class="header-productos">
                <p>Producto</p>
                <p>P. Compra</p>
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
                        <p class="w-[295px]">{{ $producto->nombre }}</p>
                        <p class="w-[115px]">{{ number_format($producto->precio_compra, 2) }}€</p>
                        <p class="w-[225px]">{{ $producto->codigo }}</p>
                        <p class="w-[95px]">{{ $stock }}uds.</p>
                        <p class="w-[175px]">{{ $texto }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
</body>
</html>