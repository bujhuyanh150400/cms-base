<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'show'])->name('show-login-admin');
    Route::post('/admin/login/auth', [AuthController::class, 'login'])->name('login-admin');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout-admin');

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'show'])->name('admin-dashboard');

        Route::prefix('users')->group(function () {
            Route::get('list', [UserController::class, 'list'])->name('users/list');
            Route::get('detail', [UserController::class, 'detail'])->name('users/detail');
            Route::get('register/{id?}', [UserController::class, 'formRegisterUser'])->name('users/register')->whereNumber('id');
            Route::post('register-submit', [UserController::class, 'registerUser'])->name('users/register-submit');
        });
        Route::prefix('role')->group(function () {
            Route::get('list', [UserController::class, 'listRole'])->name('role/list');
            Route::get('register', [UserController::class, 'formRegisterRole'])->name('role/register');
            Route::post('register-submit', [UserController::class, 'registerRole'])->name('role/register-submit');
        });
    });
});
