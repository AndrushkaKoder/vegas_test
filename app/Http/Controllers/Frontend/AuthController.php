<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function index()
	{
		return view('frontend.user.login');
	}

	public function create()
	{

		return view('frontend.user.register');
	}

	public function store()
	{
		if (!request('check'))
			return redirect()->back()->with('error', 'Дайте согласие на обработку данных');

		if (request('password') === request('password_repeat')) {
			request()->validate([
				'name' => 'required',
				'email' => 'required',
				'password' => 'required',
				'password_repeat' => 'required'
			]);

			$user = new User();
			$user->fill(request()->all());
			$user->save();

		} else {
			return redirect()->back()->with('error', 'Пароли не совпадают, повторите ввод');
		}

		return redirect()->route('frontend.user.index')->with('success', 'Добро пожаловать!');

	}

	public function login(): \Illuminate\Http\RedirectResponse
	{
		request()->validate([
			'login' => ['required', 'max:50'],
			'password' => 'required'
		]);

		if (Auth::guard('user')->attempt([
			'name' => request('name'),
			'password' => request('password'),
		])) {
			return redirect()->route('frontend.user.index');
		} else {
			return back()->with('error', 'Некорректные данные. Попробуйте еще раз');
		}
	}

}
