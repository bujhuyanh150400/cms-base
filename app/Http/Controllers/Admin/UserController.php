<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function list(){
        return view('Backend.Users.list',[
            'title'=> 'Admin - list user',
            'titleHeader' => 'Danh sách nhân viên'
        ]);
    }
//    public function showRegister(){
//        return view('admin.user.register',[
//            'title'=> 'Admin - list user',
//            'title-header' => 'User/header'
//        ]);
//    }

    // Test registration
    public function register(Request $request){
        $data = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_password' => 'required',
            'user_birth' => 'required',
            'user_department' => 'required',
            'user_position' => 'required',
            'user_phone' => 'required',

        ]);
        $data['user_id'] = $this->getIdAsTimestamp();
        $data['user_password'] = bcrypt($data['user_password']);
        UsersModel::create($data);
        return view('welcome');
    }

}
