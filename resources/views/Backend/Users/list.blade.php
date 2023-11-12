@extends('Layouts.layout_backend')
@section('title', $title)
@section('title-header', $titleHeader)


@section('main')

    <div class="inline-flex items-center justify-between w-full">
        <h1 class="my-2 font-medium text-lg">{{ $titleHeader }}</h1>
        <ul x-data class="inline-flex items-center p-2 gap-2 text-sm rounded-lg bg-gray-300/50">
            <li
                class="bg-white/60 text-purple-800 px-2 py-1 rounded-lg font-medium drop-shadow-2xl border border-white cursor-pointer hover:text-purple-800">
                Danh sách nhân viên
            </li>
            <li class="font-medium cursor-pointer px-2 py-1 hover:text-purple-800"
                x-on:click="window.location.href = '{{ route('users/register') }}'">
                Form nhân viên
            </li>
        </ul>
    </div>

    <div class="relative overflow-x-auto shadow-xl my-4 rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 w-10">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tên
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 w-[2rem]">
                        vị trí
                    </th>
                    <th scope="col" class="px-6 py-3 w-[2rem]">
                        giới tính
                    </th>
                    <th scope="col" class="px-6 py-3 w-[2rem]">
                        Được đăng nhập
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b hover:bg-gray-50 ">
                        <td class="px-6 py-4 text-center">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->gender == 1 ? 'Nam' : 'Nữ' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->access_login == 1 ? 'Có' : 'Không' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $users->links() !!}
@endsection
