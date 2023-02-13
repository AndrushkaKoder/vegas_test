<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServicesController;


Route::middleware('admin')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');

	Route::resource('services', ServicesController::class);

	/*Route::get('services', [ServicesController::class, 'index'])->name('services.index');
	Route::get('services/create', [ServicesController::class, 'create'])->name('services.create');
	Route::post('services/create', [ServicesController::class, 'store'])->name('services.store');
	Route::get('services/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
	Route::put('services/update/{id}', [ServicesController::class, 'update'])->name('services.update');
	Route::delete('services/destroy/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');*/
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin.login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');




