<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
	use SendsPasswordResetEmails;

	public function showLinkRequestForm()
	{
		return view('auth.passwords.email', ['page' => new Page(['title' => 'Восстановление пароля'])]);
	}
}
