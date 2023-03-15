<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

	use ResetsPasswords;


	public function showResetForm(Request $request)
	{
		$token = $request->route()->parameter('token');

		return view('auth.passwords.reset', ['page' => new Page(['title' => 'Восстановление пароля'])])->with(
			['token' => $token, 'email' => $request->email]
		);
	}

	public function redirectTo(){

		session()->flash('success', 'Пароль успешно сброшен!');
		return route('user.index');
	}

}
