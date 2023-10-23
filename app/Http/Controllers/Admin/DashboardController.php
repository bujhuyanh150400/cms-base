<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {

    }
    public function show(){
        return view('Backend.Dashboard.dashboard',[
            'title' => 'Admin - Dashboard'
        ]);
    }
}
