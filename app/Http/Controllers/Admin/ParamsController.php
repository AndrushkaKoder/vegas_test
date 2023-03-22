<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Params;
use Illuminate\Http\Request;

class ParamsController extends Controller
{
	public function index()
	{
		return redirect()->route('admin.params.main');
	}

	public function mainSettings()
	{
		return view('admin.params.pages.main');
	}

	public function socialSettings()
	{
		return view('admin.params.pages.social');
	}

	public function contactsSettings()
	{
		return view('admin.params.pages.contacts');
	}


	public function update()
	{
		foreach (request('data') as $key=>$value){
			Params::updateOrCreate([
				'name' => $key
			], [
				'value' => $value
			]);
		}

		return redirect()->back()->with('success', 'Данные обновлены');
	}
}
