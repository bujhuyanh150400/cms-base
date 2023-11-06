<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="p-0 m-0 bg-stone-200">
    <main class="flex ">
        {{--        <form action="{{ route('logout-admin') }}" method="POST"> --}}
        {{--            @csrf --}}
        {{--            @method('POST') --}}
        {{--            <button type="submit" --}}
        {{--                    class="block w-full text-left px-4 py-2 transition text-red-400 duration-200 hover:bg-gray-400 hover:text-white" --}}
        {{--            > --}}
        {{--                <i class="bi bi-box-arrow-right"></i> Log out --}}
        {{--            </button> --}}
        {{--        </form> --}}
        <div class="py-5">
            @yield('main')
        </div>
    </main>
</body>

</html>
