<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
            
    }
    public function showLogin(){
        return view('Backend.Auth.login');
    }
}
