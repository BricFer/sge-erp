<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Home')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css'])
        
    </head>
    <body class="flex flex-col p-1">

        <div class="flex m-auto gap-10 flex-row flex-wrap justify-center items-center max-w-7xl h-screen">

            <a href="{{ route('cliente.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <img src="{{ asset('assets/img/clientes.png') }}" alt="image icon of client">
            </a>

            <a href="{{ route('cliente.home') }}"class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <img src="{{ asset('assets/img/almacen.png') }}" alt="image icon of client">
            </a>

            <a href="{{ route('cliente.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <img src="{{ asset('assets/img/factura.png') }}" alt="image icon of client">
            </a>

            <a href="{{ route('cliente.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <img src="{{ asset('assets/img/proveedor.png') }}" alt="image icon of client">
            </a>

            <a href="{{ route('cliente.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                <img src="{{ asset('assets/img/producto.png') }}" alt="image icon of client">
            </a>

        </div>
    </body>
</html>
