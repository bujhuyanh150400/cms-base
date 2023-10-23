<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'show'])->name('show-login-admin');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login-admin');
    Route::get('/admin/dashboard', [DashboardController::class,'show'])->name('admin-dashboard');
});

