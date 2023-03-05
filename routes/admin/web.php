<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\NavController;
use App\Http\Controllers\Admin\SettingsController;


Route::middleware('admin')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');

	Route::resource('services', ServicesController::class);

	Route::resource('feedback', FeedbackController::class)->only(['index', 'show', 'destroy', 'update']);
	Route::post('feedback/{id}/change_checked', [FeedbackController::class, 'changeChecked'])->name('feedback.checked');
//	Route::post('feedback/sortFeedback', [FeedbackController::class, 'sortFeedback'])->name('feedback.sortFeedback');

	Route::resource('pages', PagesController::class);
	Route::post('services/structure', [ServicesController::class, 'structure'])->name('services.structure');

	Route::resource('nav', NavController::class);
	Route::post('/nav/change_structure', [NavController::class, 'change_structure'])->name('nav.change_structure');

	Route::resource('settings', SettingsController::class);
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin.login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');




