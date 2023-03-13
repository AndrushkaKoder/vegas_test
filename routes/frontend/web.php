<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\SendEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\LkController;
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

Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::get('login/register', [AuthController::class, 'create'])->name('login.create');
Route::post('login/register', [AuthController::class, 'store'])->name('login.store');
Route::post('user/login', [AuthController::class, 'login'])->name('user.login');

Route::middleware('auth')->group(function (){
	Route::get('user', [LkController::class, 'index'])->name('user.index');
	Route::get('logout',[LkController::class, 'logout'])->name('logout');
});

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('{uri}', [PageController::class, 'showPage'])
	->where('uri', '.*')->name('showPage');



