<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Lk\LkController;


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

Route::middleware('user_auth')->group(function (){
	Route::get('/', [LkController::class, 'index'])->name('index');
	Route::get('settings', [LkController::class, 'edit'])->name('settings');
	Route::post('settings/update', [LkController::class, 'update'])->name('settings.update');
	Route::get('orders', [LkController::class, 'orders'])->name('orders');
});

