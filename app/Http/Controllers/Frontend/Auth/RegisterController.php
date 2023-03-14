<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
	use RegistersUsers;

	protected $redirectTo = RouteServiceProvider::HOME;


	public function __construct()
	{
		$this->middleware('user_not_auth');
	}


	public function showRegistrationForm()
	{
		return view('auth.register', ['page' => new Page([
			'title' => 'Регистрация',
		]),
		]);
	}

	protected function guard()
	{
		return Auth::guard('user');
	}


	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:2', 'confirmed'],
		]);
	}


	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}

//	protected function registered(Request $request, $user)
//	{
//
//	}

	public function redirectTo()
	{
		return route('user.index');
	}
}
