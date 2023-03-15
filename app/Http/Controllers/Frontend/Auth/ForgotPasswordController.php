<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
	use SendsPasswordResetEmails;

	public function showLinkRequestForm()
	{
		return view('auth.passwords.email', ['page' => new Page(['title' => 'Восстановление пароля'])]);
	}

//	переопределен путь редиректа
	protected function sendResetLinkResponse(Request $request, $response)
	{
		return $request->wantsJson()
			? new JsonResponse(['message' => trans($response)], 200)
			: redirect()->route('frontend.index')->with('success', 'Мы отправили уникальную ссылку на Вашу почту');
	}
}
