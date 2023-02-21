<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\SendEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;


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

Route::get('/services/{slug}', [IndexController::class, 'show'])->name('services.show');

Route::post('/send/service', [SendEmailController::class, 'sendEmail'])->name('sendEmailService');
Route::post('/send/about', [SendEmailController::class, 'sendEmailAbout'])->name('sendEmailAbout');

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('{uri}', [PageController::class, 'showPage'])
	->where('uri', '.*')->name('showPage');


