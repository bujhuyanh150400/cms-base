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
            'department' => 'required',
            'position' => 'required',
            'access_login' => 'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
