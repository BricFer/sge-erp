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
        @livewireStyles
    </head>
    <body class="p-1">
        <header>
            @include('layouts._partials.navbar')
            @include('layouts._partials.searchbar')
        </header>
        <main>
            @include('layouts._partials.messages')
            {{-- @yield('form') --}}
            @yield('content')
        </main>

        @livewireScripts
    </body>
</html>
