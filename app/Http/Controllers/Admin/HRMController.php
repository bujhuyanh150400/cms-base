<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\Admin\Role;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRMController extends Controller
{

    private const PER_PAGE = 10;

    public function __construct()
    {
    }

    /**
     * // ---------------- Danh mục quan lý user ------------------//
     */
    public function listUser(Request $request)
    {
        $perPage = $request->input('perPage', self::PER_PAGE);
        $page = request()->query('page', 1);

        $users = User::paginate($perPage, ['*'], 'page', $page);

        return view('Backend.HRM.list', [
            'title' => 'Admin - list user',
            'titleHeader' => 'Danh sách nhân viên',
            'users' => $users
        ]);
    }
    public function showAddUser()
    {
        return view('Backend.HRM.add-user', [
            'roles' => Role::all(),
            'accessLoginList' => UserConstant::getListAccessLogin(),
            'title' => 'Admin - add user',
            'titleHeader' => 'Form Nhân viên'
        ]);
    }
    public function submitAddUser(UserRequest $request)
    {
        $data = [
            'id' => $this->getIdAsTimestamp(),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'birth' => $request->input('birth'),
            'gender' => $request->input('gender'),
            'updated_by' => Auth::user()->id,
            'access_login' => $request->input('access_login'),
        ];
        $user = User::create($data);
        if ($user) {
            $roleId = $request->input('role');
            // Liên kết vai trò với người dùng mới
            $user->role()->attach($roleId);
            session()->flash('success', 'Lưu trữ dữ liệu thành công!');
            return redirect()->route('users/list');
        } else {
            session()->flash('error', 'Có lỗi gì đó khi inset database');
            return redirect()->back()->withInput();
        }
    }

    public function showEditUser(int $id)
    {
        $user = User::where('id',$id)->first();
        if(empty($user)){
            session()->flash('error', 'Không tìm thấy user trong database');
            return redirect()->route('users/list');
        }else{
            return view('Backend.HRM.edit-user', [
                'user'=>$user,
                'roles' => Role::all(),
                'accessLoginList' => UserConstant::getListAccessLogin(),
                'title' => 'Admin - edit user',
                'titleHeader' => 'Edit nhân viên '.$user->name
            ]);
        }
    }
    public function submitEditUser(UserRequest $request)
    {
        $data = [
            'id' => $this->getIdAsTimestamp(),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'birth' => $request->input('birth'),
            'gender' => $request->input('gender'),
            'updated_by' => Auth::user()->id,
            'access_login' => $request->input('access_login'),
        ];
        $user = User::create($data);
        if ($user) {
            $roleId = $request->input('role');
            // Liên kết vai trò với người dùng mới
            $user->role()->attach($roleId);
            session()->flash('success', 'Lưu trữ dữ liệu thành công!');
            return redirect()->route('users/list');
        } else {
            session()->flash('error', 'Có lỗi gì đó khi inset database');
            return redirect()->back()->withInput();
        }
    }


    /**
     * // ---------------- Danh mục quan lý role ------------------//
     */

    public function listRole(Request $request)
    {
        $perPage = $request->input('perPage', self::PER_PAGE);
        $page = request()->query('page', 1);

        $roleData = Role::paginate($perPage, ['*'], 'page', $page);

        return view('Backend.HRM.list-role', [
            'title' => 'Admin - list roles',
            'titleHeader' => 'Danh sách Role',
            'roles' => $roleData
        ]);
    }
    public function formRegisterRole(Request $request)
    {
        return view('Backend.HRM.add-role', [
            'title' => 'Admin - add roles',
            'titleHeader' => 'Thêm Role',
        ]);
    }

    public function registerRole(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4|max:50',
            'description' => 'required|max:255',
        ]);
        $result = Role::create([
            'id' => $this->getIdAsTimestamp(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => Auth::user()->id
        ]);
        if ($result) {
            session()->flash('success', 'Lưu trữ dữ liệu thành công!');
            return redirect()->route('users/list-role');
        } else {
            session()->flash('error', 'Có lỗi gì đó khi inset database');
            return redirect()->back()->withInput();
        }
    }
}
