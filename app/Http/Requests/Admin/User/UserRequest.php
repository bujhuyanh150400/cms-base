<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required','email',Rule::unique('tbl_users')],
            'name' => 'required',
            'password' => 'required|min:8|max:36',
            'conf_pass' => 'required|min:8|max:36|same:password',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
            'birth' => 'required|date',
            'gender' => 'required|in:1,2',
            'role' => 'required',
            'access_login' => 'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Địa chỉ email đã tồn tại trong hệ thống.',

            'name.required' => 'Vui lòng nhập tên.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 36 ký tự.',

            'conf_pass.required' => 'Vui lòng nhập lại mật khẩu.',
            'conf_pass.min' => 'Mật khẩu xác nhận phải có ít nhất 8 ký tự.',
            'conf_pass.max' => 'Mật khẩu xác nhận không được vượt quá 36 ký tự.',
            'conf_pass.same' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu.',

            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',

            'birth.required' => 'Vui lòng nhập ngày sinh.',
            'birth.date' => 'Ngày sinh không hợp lệ.',

            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',

            'role.required' => 'Vui lòng chọn vai trò của người dùng.',

            'access_login.required' => 'Vui lòng chọn quyền truy cập đăng nhập.',
            'access_login.in' => 'Quyền truy cập đăng nhập không hợp lệ.',
        ];
    }
}
