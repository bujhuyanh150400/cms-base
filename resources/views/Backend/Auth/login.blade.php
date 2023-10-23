<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? 'LARAVEL'}}</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="fixed w-screen h-screen flex justify-between items-center p-5">
<div
    class="h-auto flex flex-col justify-center gap-5 p-5 bg-white z-10 lg:w-1/2 lg:basis-1/2 w-full rounded-3xl shadow-2xl lg:shadow-none lg:rounded-none">
    <h1 class="text-5xl font-bold mb-2 text-sky-500">Welcome back</h1>
    <h2 class="text-md font-normal mb-5 text-gray-500">Hãy điền email và password để đăng nhập</h2>
    @error('login')
    <div class="p-4 my-2 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
        <span class="font-medium">{{ $message }}</span>
    </div>
    @enderror
    <form method="POST" action="{{route('login-admin')}}">
        @csrf
        @method('POST')
        <div class="flex flex-col gap-5 justify-items-start items-start">
            <div class="block w-full">
                @error('email')
                <label class="text-sm font-medium text-red-400 mb-2">
                    <strong>{{ $message }}</strong>
                </label>
                @enderror
                <x-input.form-input id="email_login" type="text" label="Email" name="email" value="{{old('email')}}"
                                    icon='<i class="bi bi-envelope"></i>' required="false"/>
            </div>
            <div class="block w-full">
                @error('password')
                <label class="text-sm font-medium text-red-400 mb-2">
                    <strong>{{ $message }}</strong>
                </label>
                @enderror
                <x-input.form-input id="password_login" type="password" label="Password" value="{{old('password')}}"
                                    name="password" icon='<i class="bi bi-key"></i>' required="false"/>
            </div>
        </div>
        <label class="relative inline-flex items-center my-4 cursor-pointer">
            <input type="checkbox" name="remember_me" value="1" class="sr-only peer" {{ old('remember_me') ? 'checked' : '' }}>
            <div
                class="w-9 h-5 bg-gray-100 rounded-full peer peer-focus:ring-3 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-300 dark:bg-slate-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute ease-in-out duration-300 after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-sky-400">
            </div>
            <span class="ml-3 text-sm font-medium text-gray-900">Remember login</span>
        </label>
        <div class="flex justify-between mt-3">
            <button type="submit"
                    class="text-white bg-gradient-to-br from-sky-500 to-blue-300 transition-all duration-200 focus:ring-4 hover:shadow-xl focus:ring-sky-200  font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                Sign in
            </button>
        </div>
    </form>
</div>
<div class="lg:w-1/2 lg:basis-1/2 lg:block md:hidden h-full p-0 relative overflow-hidden rounded-xl">
    <div
        class="absolute -right-1/4 bottom-10 rotate-12 bg-gradient-to-b from-sky-500 to-lime-300 w-full h-full rounded-xl">
    </div>
</div>
<div class="lg:hidden md:fixed absolute inset-0 bg-gradient-to-b from-sky-500 to-lime-300 w-full h-full z-0">
</div>
</body>
</html>
