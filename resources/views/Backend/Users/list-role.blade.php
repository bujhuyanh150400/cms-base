@extends('layouts.layout_backend')

@section('title',$title)
@section('title-header',$titleHeader)

@section('main')
    <div class="bg-white p-4 rounded-xl shadow-2xl">
        <p class="global-admin-title">{{$titleHeader}}</p>
        <button class="btn-color" onclick="return window.location.href = '{{route('users/form-register-role')}}'">Thêm role</button>
        <div class="relative overflow-x-auto shadow-xl my-4 rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 w-10">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tên vai trò
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mô tả
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tạo lúc
                    </th>
                    <th scope="col" class="px-6 py-3 w-[2rem]">
                        Cập nhật lúc
                    </th>
                    <th scope="col" class="px-6 py-3 w-[2rem]">
                        Cập nhật bởi
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr class="bg-white border-b hover:bg-gray-50 ">
                        <td class="px-6 py-4 text-center">
                            {{$role->id_role}}
                        </td>
                        <td class="px-6 py-4 ">
                            {{$role->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$role->description}}
                        </td>
                        <td class="px-6 py-4">
                            {{\Carbon\Carbon::parse($role->created_at)->format('d-m-Y')}}
                        </td>
                        <td class="px-6 py-4">
                            {{$role->updated_at}}
                        </td>
                        <td class="px-6 py-4">
                            {{$role->updated_by}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {!! $roles->links()!!}
    </div>
@endsection
