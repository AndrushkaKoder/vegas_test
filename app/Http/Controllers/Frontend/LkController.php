<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LkController extends Controller
{

	public function index()
	{
		return view('frontend.lk.index.index');
	}


	public function create()
	{
		//
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
		//
	}


	public function update(Request $request, $id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}

	public function logout()
	{
		Auth::guard('user')->logout();
		request()->session()->regenerate();
		request()->session()->regenerateToken();
		redirect()->route('/');
	}
}
