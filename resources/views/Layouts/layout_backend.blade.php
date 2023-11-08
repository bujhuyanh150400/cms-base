<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="p-0 m-0 bg-stone-200 h-full">
    <section class="flex w-full h-full">
        <x-backend.section.navbar/>
        <div class="w-full">
            <x-backend.section.header>
                <x-slot name="title">
                    @yield('title-header')
                </x-slot>
            </x-backend.section.header>
            @yield('main')
        </div>
    </section>
</body>

</html>



  {{--        <form action="{{ route('logout-admin') }}" method="POST"> --}}
        {{--            @csrf --}}
        {{--            @method('POST') --}}
        {{--            <button type="submit" --}}
        {{--                    class="block w-full text-left px-4 py-2 transition text-red-400 duration-200 hover:bg-gray-400 hover:text-white" --}}
        {{--            > --}}
        {{--                <i class="bi bi-box-arrow-right"></i> Log out --}}
        {{--            </button> --}}
        {{--        </form> --}}
