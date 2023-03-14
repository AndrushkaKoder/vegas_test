<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SendEmailController;
use App\Http\Controllers\Frontend\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');


Route::get('service', [ServicesController::class, 'index'])->name('service');
Route::get('/service/{slug}', [ServicesController::class, 'show'])->name('service.show');

Route::post('/send/service', [SendEmailController::class, 'sendEmail'])->name('sendEmailService');
Route::post('/send/about', [SendEmailController::class, 'sendEmailAbout'])->name('sendEmailAbout');

Auth::routes();


Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('{uri}', [PageController::class, 'showPage'])
	->where('uri', '.*')->name('showPage');
