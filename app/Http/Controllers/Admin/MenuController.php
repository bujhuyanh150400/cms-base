<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {

    }

    public function list(){
        return view('Backend.Menu.list',[
            'title'=>'Admin - quản lý menu',
            'titleHeader'=> 'Quản lý menu'
        ]);
    }

    public function insetMenuAjax(Request $request){

    }

}
