@extends('Layouts.layout_backend')
@section('title', 'Login to Admin Panel')

@section('body')
    <div class='relative w-screen h-screen flex justify-center items-center'>
        <div class="absolute top-0 left-0 right-0 w-full h-1/2 p-4">
            <div class="bg-gradient-to-r from-red-200 to-blue-100 w-full h-full drop-shadow-xl rounded-xl">

            </div>
        </div>
        <div class="w-1/4 h-2/3 bg-white rounded-md drop-shadow-lg p-4">
            <h1 class="text-3xl font-bold mb-2">Welcome back</h1>
            <h2 class="text-md font-normal">Enter your email and password to sign in</h1>
                <form action="POST" class="">
                    @csrf
                    @method('POST')
                    <x-input.form-group id="" />
                </form>
        </div>
    </div>
@endsection
