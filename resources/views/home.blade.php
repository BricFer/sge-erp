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
    <body class="relative text-white p-1 bg-[#FDFDFC]/95 dark:bg-[#0a0a0a]/95 flex flex-col">
        
        <nav class="flex flex-row justify-between items-center w-full p-4">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo image" class="block rounded-[50%] w-[55px]">
            
            <div class="flex flex-row justify-between items-center gap-2">
                <a href="{{ route('profile.show') }}">{{ Auth::user()->user }}</a>
                <a href="#">
                    <img class="block" src="{{ asset('assets/icons/sms-icon.svg') }}" alt="message icon">
                </a>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img class="block" src="{{ asset('assets/icons/exit-icon.svg') }}" alt="exit icon">
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </nav>

        <div class="flex flex-col gap-14 max-w-7xl h-screen p-16 m-auto w-full">

            <div class="w-full">
                <h2 class="w-full my-2 border-b-solid border-b-4 border-b-indigo-600/25 mb-8 text-lg font-semibold uppercase tracking-wider text-indigo-600 drop-shadow-lg">Socios</h2>

                <div class="flex gap-4">
                    <a href="{{ route('cliente.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                        <img src="{{ asset('assets/img/clientes.png') }}" alt="image icon of client">
                    </a>
    
                    <a href="{{ route('proveedor.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                        <img src="{{ asset('assets/img/proveedor.png') }}" alt="image icon of client">
                    </a>
                </div>
            </div>

            <div class="w-full">
                <h2 class="w-full my-2 border-b-solid border-b-4 border-b-indigo-600/25 mb-8 text-lg font-semibold uppercase tracking-wider text-indigo-600 drop-shadow-lg">Empleados</h2>

                <a href="{{ route('empleado.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                    <img src="{{ asset('assets/img/empleado.png') }}" alt="image icon of client">
                </a>
            </div>

            <div class="w-full">
                <h2 class="w-full my-2 border-b-solid border-b-4 border-b-indigo-600/25 mb-8 text-lg font-semibold uppercase tracking-wider text-indigo-600 drop-shadow-lg">Almacen | Productos</h2>

                <div class="flex gap-4">
                    <a href="{{ route('almacen.home')}}"class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                        <img src="{{ asset('assets/img/almacen.png') }}" alt="image icon of client">
                    </a>
    
                    <a href="{{ route('producto.home') }}" class="block w-[175px] border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50">
                        <img src="{{ asset('assets/img/producto.png') }}" alt="image icon of client">
                    </a>
                </div>
            </div>

            <div class="w-full">
                <h2 class="w-full my-2 border-b-solid border-b-4 border-b-indigo-600/25 mb-8 text-lg font-semibold uppercase tracking-wider text-indigo-600 drop-shadow-lg">Facturas</h2>

                <div class="flex gap-4">
                    <a
                        href="{{ route('factura.compras') }}"
                        class="block w-[175px] mb-8 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50"
                    >
                        <img
                            id="compras"
                            src="{{ asset('assets/img/presupuesto.png') }}"
                            alt="image icon of client"
                        />
                    </a>
    
                    <a
                        href="{{ route('factura.ventas') }}"
                        class="block w-[175px] mb-8 border-solid border-2 border-indigo-600 p-3 rounded-2xl shadow-lg shadow-indigo-500/50"
                    >
                        <img
                            id="compras"
                            src="{{ asset('assets/img/albaran.png') }}"
                            alt="image icon of client"
                        />
                    </a>
                </div>
            </div>

        </div>
        
    </body>
</html>
