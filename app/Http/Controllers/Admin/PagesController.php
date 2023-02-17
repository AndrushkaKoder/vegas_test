<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function index()
	{
		$pages = Page::all();

		return view('admin.pages.index', compact('pages'));
	}


	public function create()
	{
		return view('admin.pages.create');
	}


	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keywords' => 'required',
		]);


		$page = new Page();
		$page->fill($request->all())->save();

		return redirect()->route('admin.pages.index')->with('success', "Страница $page->title добавлена");
	}


	public function edit($id)
	{
		$item = Page::query()->find($id);

		return view('admin.pages.edit', compact('item'));
	}


	public function update(Request $request, $id)
	{
		$page = Page::query()->find($id);
		$page->update($request->all());


		return redirect()->route('admin.pages.index')->with('success', "Страница $page->title изменена");
	}


	public function destroy($id)
	{
		$page = Page::query()->findOrFail($id);
		Page::query()->findOrFail($id)->delete();

		return redirect()->route('admin.pages.index')->with('success', "Страница $page->title была удалена");
	}



}
