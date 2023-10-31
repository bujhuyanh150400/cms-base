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
                    <label class="font-medium text-sm @error('position') text-red-500 @enderror" for="position">Vị trí</label>
                    <x-input.select id="position" name="position">
                        <x-slot name="option">
                            <option>Lựa chọn</option>
                            @foreach(UserConstant::getListPosition() as $position)
                                <option value="{{$position['value']}}" @if(old('position') == $position['value']) selected @endif>{{$position['text']}}</option>
                            @endforeach
                        </x-slot>
                    </x-input.select>
                    @error('position')
                        <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm @error('department') text-red-500 @enderror" for="department">Phòng ban</label>
                    <x-input.select id="department" name="department">
                        <x-slot name="option">
                            <option>Lựa chọn</option>
                            @foreach(UserConstant::getListDepartment() as $deparment)
                                <option value="{{$deparment['value']}}" @if(old('deparment') == $deparment['value']) selected @endif>{{$deparment['text']}}</option>
                            @endforeach
                        </x-slot>
                    </x-input.select>
                    @error('department')
                        <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm @error('access_login') text-red-500 @enderror" for="access_login">Cho phép đăng nhập</label>
                    <x-input.select id="access_login" name="access_login">
                        <x-slot name="option">
                            <option value="0" @if(old('deparment') == 0) selected @endif>Không cho phép</option>
                            <option value="1" @if(old('deparment') == 1) selected @endif>Cho phép</option>
                        </x-slot>
                    </x-input.select>
                    @error('access_login')
                    <span class="text-xs font-medium text-red-500 inline-flex items-center gap-2"><i class="bi bi-exclamation-circle"></i>{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 col-span-full">
                <x-input.button type="button" color="non-color">
                    Huỷ
                </x-input.button>
                <x-input.button type="submit" color="color">
                    Lưu người dùng
                </x-input.button>
            </div>

        </form>
    </div>
@endsection
