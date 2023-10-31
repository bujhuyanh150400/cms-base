@extends('Layouts.layout_backend')
@section('title', $title)
@section('title-header', $titleHeader)


@section('main')
    <div class="bg-white p-4 rounded-xl shadow-2xl">
        <p class="global-admin-title">{{$titleHeader}}</p>
        <div class="grid grid-cols-6">
            <select id="page" class="border-4">
                <option selected>Choose a country</option>
            </select>
            <a href="{{route('users/form-register-user')}}">Thêm user</a>
        </div>
        <x-table></x-table>
    </div>
@endsection
