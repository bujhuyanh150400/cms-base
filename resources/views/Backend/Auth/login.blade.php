@extends('Layouts.layout_backend')
@section('title', 'Login to Admin Panel')

@section('body')
    <div class='relative w-screen h-screen flex justify-center items-center '>
        <div class="absolute top-0 left-0 right-0 w-full h-full p-5 ">
            <div class=" bg-gradient-to-r from-sky-300 to-indigo-200 w-full h-full drop-shadow-xl rounded-xl blur-sm">
            </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 h-auto bg-white rounded-lg drop-shadow-xl p-8">
            <h1 class="text-3xl font-bold mb-2">Welcome back</h1>
            <h2 class="text-md font-normal mb-5">Enter your email and password to sign in</h2>
            <form action="POST" class="">
                @csrf
                @method('POST')
                <div class="flex flex-col gap-5 justify-items-start items-start w-full">
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
                <div class="flex justify-between mt-3">
                    <button type="submit" class="border-2 py-2 px-6 rounded-2xl bg-sky-200 font-bold ">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
