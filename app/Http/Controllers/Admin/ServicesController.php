<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
	public function index()
	{
		$items = Service::query()
			->sSorted()
			->paginate(10);

		return view('admin.services.index.index', compact('items'));
	}

	public function create()
	{
		$service = new Service();
		$action = 'admin.services.store';
		$method = 'POST';
		return view('admin.services.edit.edit', compact('service', 'action', 'method'));
	}

	public function store(): \Illuminate\Http\RedirectResponse
	{

		$this->serviceValidate();
		$service = new Service();
		$service->fill(request()->all())->save();
		$this->saveImages($service);

		return redirect()->route('admin.services.edit', $service->id)
			->with('success', 'Запись добавлена');
	}


	public function edit($id)
	{
		$service = Service::query()->findOrFail($id);
		$action = 'admin.services.update';
		$method = 'GET';
		return view('admin.services.edit.edit', compact('service', 'action', 'method'));
	}


	public function update(int $id): \Illuminate\Http\RedirectResponse
	{
//		dd(request()->all());
		$this->serviceValidate();

		/** @var Service $service */
		$service = Service::query()->findOrFail($id);
		$service->update(request()->all());

//		dd($service);
		$this->saveImages($service);
		$this->deleteImages($service);


		return redirect()->route('admin.services.edit', $service->id)->with('success', 'Данные обновлены');
	}


	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Service::query()->findOrFail($id)->delete();
		return redirect()->route('admin.services.index')->with('success', 'Сервис удалён');
	}

	public function saveImages(Service $service)
	{
		foreach ((array) request()->file('files_image') as $name => $obj) {
			$service->saveFile($name, $obj);
		}
	}

	public function deleteImages(Service $service)
	{
		if (request()->has('delete_files')) {
			foreach (request('delete_files') as $key => $value) {
				if ($value === "1") {
					$service->deleteFile($key);
				}
			}
		}
	}

	public function serviceValidate()
	{
		return request()->validate([
			'title' => 'required',
			'short_content' => 'required',
			'content' => 'required',
			'inner' => 'image',
			'outer' => 'image',
		]);
	}


	public function structure()
	{
		$data = request('data');

		foreach ($data as $key => $value) {
			$id = $value['id'];
			$position = $key;

			Service::query()->where('id', $id)->update([
				'position' => $position,
			]);
		}
	}

}
