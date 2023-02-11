<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
	 */
	public function index()
	{
		$services = Service::query()
			->orderBy('id', 'desc')
			->paginate(10);

		return view('admin.services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
	 */
	public function create()
	{
		$service = new Service();
		$action = 'admin.services.store';
		$method = 'POST';
		return view('admin.services.edit', compact('service','action', 'method'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
//	Добавление нового сервиса
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'short_content' => 'required',
			'content' => 'required',
			'inner_photo' => 'image',
			'outer_photo' => 'image',
		]);

		$service = new Service();

		$service->fill($request->only([
			'title',
			'short_content',
			'content',
		]))->save();

		$photos = ['inner', 'outer'];
		foreach ($photos as $photoName) {
			if ($file = $request->file($photoName)) {
				$service->saveFile($photoName, $file);
			}
		}
		return redirect()->route('admin.services.edit', $service->id)
			->with('success', 'Запись добавлена');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
	 */
	public function edit($id, Request $request)
	{
		$service = Service::query()->findOrFail($id);
		$action = 'admin.services.update';
		$method = 'GET';
		return view('admin.services.edit', compact('service', 'action', 'method'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return string
	 */
	public function update(int $id, Request $request)
	{

		$request->validate([
			'title' => 'required',
			'short_content' => 'required',
			'content' => 'required',
			'inner_photo' => 'image',
			'outer_photo' => 'image',
		]);


		$service = Service::query()->findOrFail($id);
		$service->update($request->only([
			'title',
			'short_content',
			'content',
		]));

//		dd($service);
		$photos = ['inner', 'outer'];
		foreach ($photos as $photoName) {
			if ($file = $request->file($photoName)) {
				$service->saveFile($photoName, $file);
			}
		}

		return redirect()->route('admin.services.edit', $service->id)->with('success', 'Данные обновлены');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
