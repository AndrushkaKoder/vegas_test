<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;



Route::get('/', [IndexController::class, 'index'])->name('admin.index');

Route::get('login', [AuthController::class, 'login'])->name('admin.login');

Route::post('login', [AuthController::class, 'auth'])->name('auth');

Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
