<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? 'LARAVEL'}}</title>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
<main class="w-screen h-screen grid grid-cols-2">
    <div class="h-auto flex flex-col justify-center gap-5 p-5 bg-white z-10 w-full">
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
                    <input  id="email_login" type="text" name="email" value="{{old('email')}}"/>
                </div>
                <div class="block w-full">
                    @error('password')
                    <label class="text-sm font-medium text-red-400 mb-2">
                        <strong>{{ $message }}</strong>
                    </label>
                    @enderror
                    <input  id="password_login" type="password"  value="{{old('password')}}"
                            name="password"/>

                </div>
            </div>
            <label class="relative inline-flex items-center my-4 cursor-pointer">
                <input type="checkbox" name="remember_me" value="1"
                       class="sr-only peer" {{ old('remember_me') ? 'checked' : '' }}>
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
    <div class="w-full h-full p-10 ">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-500 w-full h-full rounded-2xl shadow-2xl">
        </div>
    </div>
</main>
</body>
</html>
