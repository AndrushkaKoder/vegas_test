<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\NavController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ParamsController;


Route::middleware('admin_auth')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');

	Route::resource('service', ServicesController::class);
	Route::post('service/change_structure', [ServicesController::class, 'change_structure'])->name('service.change_structure');

	Route::resource('feedback', FeedbackController::class)->only(['index', 'show', 'destroy', 'update']);
	Route::post('feedback/{id}/toggle_param/{param}', [FeedbackController::class, 'toggle_param'])->name('feedback.toggle_param');

	Route::resource('page', PagesController::class);

	Route::resource('navigation', NavController::class);
	Route::post('/navigation/change_structure', [NavController::class, 'change_structure'])->name('navigation.change_structure');

	Route::resource('settings', SettingsController::class);

	Route::resource('slider',SliderController::class);
	Route::post('/slider/change_structure', [SliderController::class, 'change_structure'])->name('slider.change_structure');
	Route::post('slider/{id}/toggle_params/{param}', [SliderController::class, 'toggle_param'])->name('slider.toggle_params');

	Route::get('params', [ParamsController::class, 'index'])->name('params.index');
	Route::get('params/main', [ParamsController::class, 'mainSettings'])->name('params.main');
	Route::get('params/social', [ParamsController::class, 'socialSettings'])->name('params.social');
	Route::get('params/contacts', [ParamsController::class, 'contactsSettings'])->name('params.contacts');
	Route::post('params/update', [ParamsController::class, 'update'])->name('params.update');

});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin_not_auth');
Route::post('login', [AuthController::class, 'auth'])->name('auth');

