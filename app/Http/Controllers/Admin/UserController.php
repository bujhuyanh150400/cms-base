<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\AuthRequest;
use App\Models\UsersModel;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{

    private const PER_PAGE = 10;

    public function __construct()
    {
    }

    public function list(Request $request)
    {

        $perPage = $request->input('perPage',self::PER_PAGE);
        $page = request()->query('page', 1);

        $users = UsersModel::paginate($perPage, ['*'], 'page', $page);

        return view('Backend.Users.list', [
            'title' => 'Admin - list user',
            'titleHeader' => 'Danh sách nhân viên',
            'users'=>$users
        ]);

    }

    public function formRegisterUser()
    {
        return view('Backend.Users.add-user', [
            'title' => 'Admin - add user',
            'titleHeader' => 'Thêm nhân viên'
        ]);
    }

    public function registerUser(UserRequest $request)
    {
        $data = [
            'id'=> $this->getIdAsTimestamp(),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'birth' => $request->input('birth'),
            'role' => $request->input('role'),
            'gender' => $request->input('gender'),
            'access_login' => $request->input('access_login'),
        ];
        $user = UsersModel::create($data);
        if ($user) {
            session()->flash('success', 'Lưu trữ dữ liệu thành công!');
            return redirect()->route('users/list');
        } else {
            session()->flash('error', 'Có lỗi gì đó khi inset database');
            return redirect()->back()->withInput();
        }
    }

    public function listRole(Request $request){
        return view('Backend.Users.list-role',[
            'title' => 'Admin - list roles',
            'titleHeader' => 'Danh sách Role',
        ]);
    }
    public function formRegistRole(Request $request){

    }

}
