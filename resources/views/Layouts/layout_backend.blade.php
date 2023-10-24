<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="p-0 m-0 bg-stone-100">
    <x-container.navbar-admin/>
    <x-container.header-admin>
        <x-slot:title>
            @yield('title-header')
        </x-slot >
    </x-container.header-admin>
    <main class="mt-20 ml-[20%] h-screen bg-red-100">

        @yield('main')
    </main>
</body>
</html>
