<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Dashboard')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @livewireStyles
        @vite(['resources/css/app.css'])
    </head>
    <body class="relative p-1 bg-[#FDFDFC]/90 dark:bg-[#0a0a0a]/90 text-[#1b1b18] flex flex-col text-white">
        
            @yield('content')

            @include('layouts._partials.advertencia')
        @livewireScripts
    </body>
</html>
