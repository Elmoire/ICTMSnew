<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DSWD WEB</title>
        <link rel= "shortcut icon" type="image/png" href="{{('/Logo/logo.png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->

    </head>
    <body style="background-image: linear-gradient(to bottom, #02225d,#677a9e)">
        <div class="font-sans text-black-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
