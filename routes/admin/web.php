<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;


Route::middleware('admin')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin.login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');



