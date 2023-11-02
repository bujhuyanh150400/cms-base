@extends('Layouts.layout_backend')
@section('title', $title)
@section('title-header', $titleHeader)



@section('main')
    <div class="bg-white p-4 rounded-xl shadow-2xl w-auto">
        <h1 class="global-admin-title">{{__('lang_admin.users.add-user.title')}}</h1>
        <form action="{{route('users/register-user')}}" method="POST">
            @csrf
            @method('POST')
            <div class="py-8 grid grid-cols-4 gap-6">
                <div class="col-span-2">
                    <x-input.form-group type="email" id="email" name="email" label="Email" placeholder="Nhập email" icon='<i class="bi bi-envelope"></i>'/>
                </div>
                <div class=" col-span-2">
                    <x-input.form-group type="text" id="name" name="name" label="Tên nhân viên" placeholder="Nhập tên nhân viên" icon='<i class="bi bi-person"></i>'/>
                </div>
                <div class=" col-span-2">
                    <x-input.form-group type="password" id="password" name="password" label="Mật khẩu" placeholder="Nhập password" icon='<i class="bi bi-lock"></i>'/>
                </div>
                <div class=" col-span-2">
                    <x-input.form-group type="password" id="conf_pass" label="Nhập lại mật khẩu" name="conf_pass" placeholder="Nhập lại password" icon='<i class="bi bi-arrow-clockwise"></i>'/>
                </div>
                <div class=" col-span-2">
                    <x-input.form-group type="text" id="address" label="Địa chỉ" name="address" placeholder="Nhập địa chỉ" icon='<i class="bi bi-map"></i>'/>
                </div>
                <div class="col-span-2">
                    <x-input.form-group type="text" id="phone" label="Số điện thoại" name="phone" placeholder="Nhập số điện thoại" icon='<i class="bi bi-telephone"></i>'/>
                </div>
                <x-input.form-group type="date" id="birth" label="Ngày sinh" name="birth" placeholder="Nhập ngày sinh" icon='<i class="bi bi-calendar"></i>'/>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm @error('role') text-red-500 @enderror" for="position">Vị trí</label>
                    <x-input.select id="role" name="role">
                        <x-slot name="option">
                            <option value="">Lựa chọn</option>
                            <option value="1">Admin</option>
                        </x-slot>
                    </x-input.select>
                    @error('role')
                        <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm @error('gender') text-red-500 @enderror" for="department">Giới tính</label>
                    <x-input.select id="gender" name="gender">
                        <x-slot name="option">
                            <option value="">Lựa chọn</option>
                            <option value="1" @if(old('gender') == 1) selected @endif>Nam</option>
                            <option value="2" @if(old('gender') == 2) selected @endif>Nữ</option>
                        </x-slot>
                    </x-input.select>
                    @error('gender')
                        <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm @error('access_login') text-red-500 @enderror" for="access_login">Cho phép đăng nhập</label>
                    <x-input.select id="access_login" name="access_login">
                        <x-slot name="option">
                            <option value="0" @if(old('access_login') == 0) selected @endif>Không cho phép</option>
                            <option value="1" @if(old('access_login') == 1) selected @endif>Cho phép</option>
                        </x-slot>
                    </x-input.select>
                    @error('access_login')
                    <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 col-span-full">
                <button type="button" class="btn-non-color" onclick="window.location.href = '{{route('users/list')}}'">
                    Huỷ
                </button>
                <button type="submit" class="btn-color">
                    Lưu người dùng
                </button>
            </div>
        </form>
    </div>
@endsection
