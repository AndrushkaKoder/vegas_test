<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{


	public function create()
	{
	}


	public function store(Request $request)
	{
		//
	}


	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		$admin = Admin::query()->findOrFail($id);

		return view('admin.settings.edit', compact('admin'));
	}


	public function update($id)
	{
//		dd(\request()->all());
		$admin = Admin::query()->findOrFail($id);
		request()->validate([
			'login' => 'required',
			'password' => 'required|min:3',
		]);

		if(request('password') === request('password_repeat')){
			$fill = request()->only([
				'login', 'password'
			]);
			$admin->fill($fill);
			$admin->save();
		} else{
			return redirect()->back()->with('success', 'Пароли не совпадают');
		}

		return redirect()->route('admin.settings.edit', $admin->id)->with('success', 'Данные успешно изменены');
	}


	public function destroy($id)
	{
		//
	}
}
