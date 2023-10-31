@extends('Layouts.layout_backend')
@section('title', $title)
@section('title-header', $titleHeader)



@section('main')
    <div class="bg-white p-4 rounded-xl shadow-2xl w-auto">
        <h1 class="global-admin-title">{{__('lang_admin.users.add-user.title')}}</h1>
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="py-8 grid grid-cols-4 gap-6">
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="email">Email</label>
                    <x-input.input type="email" id="email" name="email" placeholder="Nhập email" icon='<i class="bi bi-envelope"></i>'/>
                </div>
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="name">Email</label>
                    <x-input.input type="text" id="name" name="name" placeholder="Nhập tên nhân viên" icon='<i class="bi bi-person"></i>'/>
                </div>
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="password">Mật khẩu</label>
                    <x-input.input type="password" id="password" name="password" placeholder="Nhập password" icon='<i class="bi bi-lock"></i>'/>
                </div>
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="conf_pass">Nhập lại mật khẩu</label>
                    <x-input.input type="password" id="conf_pass" name="conf_pass" placeholder="Nhập lại password" icon='<i class="bi bi-arrow-clockwise"></i>'/>
                </div>
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="address">Địa chỉ</label>
                    <x-input.input type="text" id="address" name="address" placeholder="Nhập địa chỉ" icon='<i class="bi bi-map"></i>'/>
                </div>
                <div class="flex flex-col gap-2 col-span-2">
                    <label class="font-medium text-sm" for="phone">Số điện thoại</label>
                    <x-input.input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" icon='<i class="bi bi-telephone"></i>'/>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm" for="birth">Ngày sinh</label>
                    <x-input.input type="date" id="birth" name="birth" placeholder="Nhập ngày sinh" icon='<i class="bi bi-calendar"></i>'/>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm" for="position">Vị trí</label>
                    <x-input.select id="position" name="position">
                        <x-slot name="option">
                            @foreach(UserConstant::getListPosition() as $position)
                                <option value="{{$position['value']}}">{{$position['text']}}</option>
                            @endforeach
                        </x-slot>
                    </x-input.select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm" for="position">Phòng ban</label>
                    <x-input.select id="position" name="position">
                        <x-slot name="option">
                            @foreach(UserConstant::getListDepartment() as $deparment)
                                <option value="{{$deparment['value']}}">{{$deparment['text']}}</option>
                            @endforeach
                        </x-slot>
                    </x-input.select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-medium text-sm" for="access_login">Cho phép đăng nhập</label>
                    <x-input.select id="access_login" name="access_login">
                        <x-slot name="option">
                            <option value="1">Cho phép</option>
                            <option value="0">Không cho phép</option>
                        </x-slot>
                    </x-input.select>
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
