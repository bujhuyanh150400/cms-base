@extends('layouts.layout_backend')

@section('title',$title)
@section('title-header',$titleHeader)

@section('main')
    <div class="bg-white p-4 rounded-xl shadow-2xl">
        <p class="global-admin-title">{{$titleHeader}}</p>
        <div class="grid grid-cols-6">
            <a class="bg-red-50 border border-gray-500 p-4" href="{{route('users/form-register-role')}}">Thêm role</a>
        </div>
    </div>
@endsection
