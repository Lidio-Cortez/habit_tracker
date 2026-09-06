<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <title>{{ config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="p-5 bg-[#FFEDD6] min-h-[calc(100vh-100px)] flex flex-col justify-between font-mono relative">
        <x-header />
        {{ $slot }}
        <x-footer />
        <x-toast />
        <script src="{{ Vite::asset('resources/js/app.js') }}"></script>
    </body>
</html>