<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|max:36',
            'conf_pass' => 'required|min:8|max:36|same:password',
            'address' => 'required|max:255',
            'phone' => 'required|number',
            'birth' => 'required|date|date_format: m-d-Y',
            'access_login' => 'required',
            'department' => 'required',
            'position' => 'required',
            'access_login' => 'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.max' => 'Mật khẩu tối đa là :max ký tự.',
        ];
    }
}
