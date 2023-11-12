@extends('Layouts.layout_backend')
@section('title', $title)
@section('title-header', $titleHeader)



@section('main')
    <div class="inline-flex items-center justify-between w-full">
        <h1 class="my-2 font-medium text-lg">{{ $titleHeader }}</h1>
        <ul x-data class="inline-flex items-center p-2 gap-2 text-sm rounded-lg bg-gray-300/50">
            <li class="font-medium cursor-pointer px-2 py-1 hover:text-purple-800"
                x-on:click="window.location.href = '{{ route('users/list') }}'"
            >
                Danh sách nhân viên
            </li>
            <li class="bg-white/60 text-purple-800 px-2 py-1 rounded-lg font-medium drop-shadow-2xl border border-white cursor-pointer hover:text-purple-800">
                Form nhân viên
            </li>
        </ul>
    </div>



    <form action="{{ route('users/register-submit') }}" method="POST">
        @csrf
        @method('POST')
        <div class="py-8 grid grid-cols-4 gap-6">
            {{-- Email --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('email') text-red-500 @enderror"
                       for="email" >
                    <i class="bi bi-envelope me-1"></i>
                    Email nhân viên
                </label>
                <input
                    value="{{old('email')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('email') border-red-300 outline-red-300 @enderror"
                    type="email" id="email" name="email" placeholder="Example@example.com"/>
                @error('email')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Name --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('name') text-red-500 @enderror"
                       for="name">
                    <i class="bi bi-person me-1"></i>
                    Tên nhân viên
                </label>
                <input
                    value="{{old('name')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('name') border-red-300 outline-red-300 @enderror"
                    type="text" id="name" name="name" placeholder="Họ và tên"/>
                @error('name')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('password') text-red-500 @enderror"
                       for="password">
                    <i class="bi bi-lock me-1"></i>
                    Mật khẩu
                </label>
                <input
                    value="{{old('password')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('password') border-red-300 outline-red-300 @enderror"
                    type="password" id="password" name="password" placeholder="Nhập mật khẩu"/>
                @error('password')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('conf_pass') text-red-500 @enderror"
                       for="conf_pass">
                    <i class="bi bi-lock me-1"></i>
                    Nhập lại mật khẩu
                </label>
                <input
                    value="{{old('conf_pass')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('conf_pass') border-red-300 outline-red-300 @enderror"
                    type="password" id="conf_pass" name="conf_pass" placeholder="Nhập lại mật khẩu"/>
                @error('conf_pass')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Address --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('address') text-red-500 @enderror"
                       for="address">
                    <i class="bi bi-compass me-1"></i>
                    Địa chỉ
                </label>
                <input
                    value="{{old('address')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('address') border-red-300 outline-red-300 @enderror"
                    type="text" id="address" name="address" placeholder="Nhập địa chỉ"/>
                @error('address')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="col-span-2 flex flex-col gap-1">
                <label class="text-sm font-medium  @error('phone') text-red-500 @enderror"
                       for="phone">
                    <i class="bi bi-telephone me-1"></i>
                    Số điện thoại
                </label>
                <input
                    value="{{old('phone')}}"
                    class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('phone') border-red-300 outline-red-300 @enderror"
                    type="text" id="phone" name="phone" placeholder="Nhập số điện thoại"/>
                @error('phone')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Gender --}}
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium  @error('gender') text-red-500 @enderror"
                       for="role">
                    <i class="bi bi-gender-ambiguous"></i>
                    Giới tính
                </label>
                <select name="gender"
                        class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('gender') border-red-300 outline-red-300 @enderror">
                    <option value="">Lựa chọn</option>
                    <option value="1"  @if (old('gender') === 1) selected @endif>Nam</option>
                    <option value="2"  @if (old('gender') === 0) selected @endif>Nữ</option>
                </select>
                @error('gender')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Role --}}
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium  @error('role') text-red-500 @enderror"
                       for="role">
                    <i class="bi bi-people me-1"></i>
                    Phân quyền
                </label>
                <select name="role"
                        class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('role') border-red-300 outline-red-300 @enderror">
                    <option value="">Chọn quyền</option>
                    @foreach($roles as $role)
                        <option value="{{$role['id_role']}}" @if($role['id_role'] === old('role')) selected @endif>{{$role['title']}}</option>
                    @endforeach
                </select>
                @error('role')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>

            {{-- Access Login --}}
            <div class="flex flex-col gap-1">
                <label class="text-sm font-medium  @error('access_login') text-red-500 @enderror"
                       for="role">
                    <i class="bi bi-person-video3 me-1"></i>
                    Cho phép truy cập
                </label>
                <select name="access_login"
                        class="rounded-lg p-2 outline-purple-300 text-sm border duration-200 focus:shadow-md @error('access_login') border-red-300 outline-red-300 @enderror">
                    <option value="">Lựa chọn</option>
                    <option value="1"  @if (old('access_login') === 1) selected @endif>Có</option>
                    <option value="0"  @if (old('access_login') === 0) selected @endif>Không</option>
                </select>
                @error('access_login')
                <span class="text-red-500 text-xs font-medium">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="flex items-center justify-end gap-2 col-span-full">
            <button type="button" class="px-4 py-2 rounded-lg bg-gray-500/50 text-white text-sm font-medium duration-200 outline-none border-none hover:-translate-y-0.5 hover:shadow-lg " onclick="window.location.href = '{{ route('users/list') }}'">
                Quay lại
            </button>
            <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-br from-violet-900 to-pink-500 text-white text-sm font-medium duration-200 outline-none border-none hover:-translate-y-0.5 hover:shadow-lg ">
                Lưu người dùng
            </button>
        </div>
    </form>
@endsection
