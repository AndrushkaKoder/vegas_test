<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function index()
	{
		$items = Page::all();

		return view('admin.pages.index.index', compact('items'));
	}


	public function create()
	{
		$item = new Page();

		$action = 'admin.pages.store';

		return view('admin.pages.edit.edit', compact('item' , 'action'));
	}


	public function store()
	{
		$this->validateData();

		$page = new Page();
		$page->fill(request()->all())->save();

		return redirect()->route('admin.pages.edit', $page->id)->with('success', "Страница $page->title добавлена");
	}


	public function edit($id)
	{
		$item = Page::query()->find($id);

		$action = 'admin.pages.update';

		return view('admin.pages.edit.edit', compact('item', 'action'));
	}


	public function update($id)
	{
		$this->validateData();

		$item = Page::query()->find($id);

		$item->update(request()->all());


		return redirect()->route('admin.pages.edit', $item->id)->with('success', "Страница изменена");
	}


	public function destroy($id)
	{
		$item = Page::query()->findOrFail($id);
		Page::query()->findOrFail($id)->delete();

		return redirect()->route('admin.pages.index')->with('success', "Страница $item->title была удалена");
	}


	protected function validateData(){
		return request()->validate([
			'uri' => 'required',
			'title' => 'required',
			'seo_title' => 'required',
			'seo_description' => 'required',
			'seo_keywords' => 'required',
		]);
	}

}
