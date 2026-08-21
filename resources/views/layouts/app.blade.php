<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="admin-shell">
        <div class="admin-layout">
            @include('layouts.navigation')

            <main class="admin-main">
                @yield('content')
                {{ $slot ?? '' }}
            </main>
        </div>
        @stack('scripts')
    </body>
</html>
