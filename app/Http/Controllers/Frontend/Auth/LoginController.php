<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	public function __construct()
	{
		$this->middleware('user_not_auth')->only('showLoginForm');
	}

	public function showLoginForm()
	{
		return view('auth.login', [
			'page' => new Page([
				'title' => 'Авторизация',
			]),
		]);
	}

	protected function guard()
	{
		return Auth::guard('user');
	}

	public function redirectTo()
	{
		return route('user.index');
	}

	protected function loggedOut(Request $request)
	{
		return redirect()->route('frontend.index');
	}


}
