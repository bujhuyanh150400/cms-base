<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function __construct()
    {
    }

    public function show()
    {
        $menus = Menu::with('children')->whereNull('parent_id')->get();
        $optionMenu = Menu::all();
        return view('Backend.Menu.list', [
            'title' => 'Admin - quản lý menu',
            'titleHeader' => 'Quản lý menu',
            'menus' => $menus,
            'optionMenu'=>$optionMenu
        ]);
    }

    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'parent-id' => 'integer',
            'description' => 'max:255',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'parent-id.integer' => 'Menu phụ thuộc phải là một số nguyên.',
            'description.max' => 'Mô tả không được vượt quá :max ký tự.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 200);
        } else {
            $res = Menu::create([
                'id' => $this->getIdAsTimestamp(),
                'title' => $request->get('title'),
                'parent_id' => $request->get('parent-id'),
                'description' => $request->get('description'),
                'action' => $request->get('action'),
                'updated_by' => Auth::user()->id
            ]);
            if ($res) {
                return response()->json([
                    'status' => true,
                    'message' => 'Tạo menu thành công'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tạo menu thất bại'
                ], 200);
            }
        }
    }
}
