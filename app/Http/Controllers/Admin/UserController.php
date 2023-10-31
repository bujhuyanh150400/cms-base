<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\AuthRequest;
use App\Models\UsersModel;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private const PAGE_LIST = 10;

    public function __construct()
    {
    }
    public function list(){
        $test = UsersModel::count();
        $perPage = self::PAGE_LIST; // Số lượng bản ghi trên mỗi trang
        $page = request()->query('page', 1); // Trang hiện tại, mặc định là 1
        $users = UsersModel::paginate($perPage, ['*'], 'page', $page);
        return view('Backend.Users.list',[
            'title'=> 'Admin - list user',
            'titleHeader' => 'Danh sách nhân viên'
        ]);
    }

    public function formRegisterUser(){
        return view('Backend.Users.add-user',[
            'title'=> 'Admin - add user',
            'titleHeader' => 'Thêm nhân viên'
        ]);
    }

    public function registerUser(UserRequest $request){
        dd($request->all());
        return redirect()->back()->withInput();
    }

    // Test registration
//    public function register(){
//        $data = $request->validate([
//            'user_name' => 'required',
//            'user_email' => 'required',
//            'user_password' => 'required',
//            'user_birth' => 'required',
//            'user_department' => 'required',
//            'user_position' => 'required',
//            'user_phone' => 'required',
//        ]);
//        $data['user_id'] = $this->getIdAsTimestamp();
//        $data['user_password'] = bcrypt($data['user_password']);
//        UsersModel::create($data);
//        return view('welcome');
//    }

}
