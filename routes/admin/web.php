<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PagesController;


Route::middleware('admin')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
	Route::resource('services', ServicesController::class);
	Route::resource('feedback', FeedbackController::class)->only(['index', 'show', 'destroy', 'update']);
	Route::resource('pages', PagesController::class);
	Route::post('feedback/{id}/change_checked', [FeedbackController::class, 'changeChecked'])->name('checked');
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin.login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');




