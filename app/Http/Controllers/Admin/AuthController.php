<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function login()
	{
		return view('admin.login');
	}

	/**
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function auth(Request $request)
	{
		$this->validate($request, [
			'login' => ['required', 'max:100'],
			'password' => ['required']
		]);

		if (Auth::guard('admin')->attempt([
			'login' => $request->input('login'),
			'password' => $request->input('password'),
			'active' => 1
		])) {
			return redirect()->route('admin.index');
		} else {
			return back()->with('error', 'Некорректные данные. Попробуйте еще раз');
		}

	}

	public function logout(Request $request): \Illuminate\Http\RedirectResponse
	{
		Auth::guard('admin')->logout();
		$request->session()->regenerate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.login');
	}
}
