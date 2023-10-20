@extends('Layouts.layout_backend')
@section('title', 'Login to Admin Panel')

@section('body')
    <div class='w-screen h-screen flex justify-center items-center items-center px-10 py-5'>
        <div class="w-1/2 flex flex-col gap-3 p-60">
            <h1 class="text-5xl font-bold mb-2 text-sky-500">Welcome back</h1>
            <h2 class="text-md font-normal mb-5 text-gray-500">Enter your email and password to sign in</h2>
            <div>
                <form action="POST" class="">
                    @csrf
                    @method('POST')
                    <div class="flex flex-col gap-5 justify-items-start items-start">
                        <div class="block w-full">
                            <x-input.form-input
                                id="email_login"
                                type="email"
                                label="Email"
                                name="user_email"
                                icon='<i class="bi bi-envelope"></i>'
                                required="true"/>
                        </div>
                        <div class="block w-full">
                            <x-input.form-input
                                id="password_login"
                                type="password"
                                label="Password"
                                name="user_email"
                                icon='<i class="bi bi-key"></i>'
                                required="true"/>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center my-4 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-100 rounded-full peer peer-focus:ring-3 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-300 dark:bg-slate-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute ease-in-out duration-300 after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-sky-400"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900">Remember login</span>
                    </label>
                    <div class="flex justify-between mt-3">
                        <button type="submit" class="text-white bg-gradient-to-br from-sky-500 to-blue-300 transition-all duration-200 focus:ring-4 hover:shadow-xl focus:ring-sky-200  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-full">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2 h-full p-0 relative overflow-hidden rounded-xl">
            <div class="absolute -right-1/4 bottom-4 rotate-12 bg-gradient-to-b from-sky-500 to-lime-300 w-full h-screen rounded-xl">
            </div>
        </div>
    </div>
@endsection
