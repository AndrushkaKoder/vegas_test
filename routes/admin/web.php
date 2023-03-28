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
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\VendorsController;

Route::middleware('admin_auth')->group(function () {
	Route::get('/', [IndexController::class, 'index'])->name('index');
	Route::get('logout', [AuthController::class, 'logout'])->name('logout');

	Route::resource('services', ServicesController::class);
	Route::post('services/change_structure', [ServicesController::class, 'change_structure'])->name('services.change_structure');

	Route::resource('feedback', FeedbackController::class)->only(['index', 'show', 'destroy', 'update']);
	Route::post('feedback/{id}/toggle_param/{param}', [FeedbackController::class, 'toggle_param'])->name('feedback.toggle_param');

	Route::resource('pages', PagesController::class);

	Route::resource('navigation', NavController::class);
	Route::post('/navigation/change_structure', [NavController::class, 'change_structure'])->name('navigation.change_structure');

	Route::resource('settings', SettingsController::class);

	Route::resource('sliders', SliderController::class);
	Route::post('/sliders/change_structure', [SliderController::class, 'change_structure'])->name('sliders.change_structure');
	Route::post('sliders/{id}/toggle_params/{param}', [SliderController::class, 'toggle_param'])->name('sliders.toggle_params');

	Route::get('params', [ParamsController::class, 'index'])->name('params.index');
	Route::get('params/main', [ParamsController::class, 'mainSettings'])->name('params.main');
	Route::get('params/social', [ParamsController::class, 'socialSettings'])->name('params.social');
	Route::get('params/contacts', [ParamsController::class, 'contactsSettings'])->name('params.contacts');
	Route::post('params/update', [ParamsController::class, 'update'])->name('params.update');

	Route::resource('products', ProductsController::class);
	Route::post('products/{id}/toggle_params/{param}', [ProductsController::class, 'toggle_param'])->name('products.toggle_params');
	Route::post('/products/change_structure', [ProductsController::class, 'change_structure'])->name('products.change_structure');

	Route::resource('categories', CategoriesController::class);
	Route::post('categories/{id}/toggle_params/{param}', [CategoriesController::class, 'toggle_param'])->name('categories.toggle_params');
	Route::post('/categories/change_structure', [CategoriesController::class, 'change_structure'])->name('categories.change_structure');

	Route::resource('vendors', VendorsController::class);
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('admin_not_auth');
Route::post('login', [AuthController::class, 'auth'])->name('auth');

