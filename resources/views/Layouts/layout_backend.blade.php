<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="p-0 m-0 bg-stone-200 h-full relative">
    <section class="flex w-full h-auto">
        <x-backend.section.navbar />
        <div class="w-full h-auto">
            <x-backend.section.header>
                <x-slot name="title">
                    @yield('title-header')
                </x-slot>
            </x-backend.section.header>
            <main
                class="bg-red-100 mx-4 mt-3 mb-12 px-6 py-4 rounded-lg border-t border-r drop-shadow-xl backdrop-blur-sm bg-white/90 z-10">
                @yield('main')
            </main>
        </div>
    </section>
    <section id="toast-section"></section>
</body>

</html>
<script type="module">
    import app from '/js/app.js';
    @if (session('success'))
        app.showToast('{{ session('success') }}', 'success');
    @endif
    @if (session('error'))
        app.showToast('{{ session('error') }}', 'error');
    @endif
</script>
@yield('scripts')
<script>
    function displayFileName(input) {
        const fileNameElement = document.getElementById('file-name');
        const fileName = input.files[0]?.name || 'Chưa chọn tệp';
        fileNameElement.textContent = 'Tệp đã chọn: ' + fileName;
    }
</script>
