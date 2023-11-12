<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="p-0 m-0 bg-stone-200 h-full relative">
    <section class="flex w-full h-full">
        <x-backend.section.navbar/>
        <div class="w-full">
            <x-backend.section.header>
                <x-slot name="title">
                    @yield('title-header')
                </x-slot>
            </x-backend.section.header>
            <main class="bg-red-100 mx-4 mt-3 px-6 py-4 rounded-lg border-t border-r drop-shadow-xl backdrop-blur-sm bg-white/90 z-10">
                @yield('main')
            </main>
        </div>
    </section>

    <div x-data="{ isOpen: true}">
        <div  x-show="isOpen"
              class="absolute bottom-5 right-4 w-full max-w-[20rem] bg-red-400 text-sm flex"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 scale-90"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-90"
        >
            <p>test 1234</p>
            <button @click="isOpen = false" class="ml-2 text-white">&times;</button>
        </div>
{{--        <button  @click="isOpen=true">Show Toast</button>--}}
    </div>
</body>

</html>




