<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin', [DashboardController::class,'show'])->name('admin-dashboard');
    Route::get('/admin/login', [AuthController::class, 'show'])->name('show-login-admin');
    Route::post('/admin/login/auth', [AuthController::class, 'login'])->name('login-admin');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout-admin');
    Route::get('/admin/users/list', [UserController::class, 'list'])->name('users/list');


    Route::match(['POST','GET'],'/admin/users/add-user', [UserController::class, 'addUser'])->name('users/add-user');
});

