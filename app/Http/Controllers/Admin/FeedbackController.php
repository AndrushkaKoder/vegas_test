<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

	public function index()
	{
		$items = Feedback::query()
			->orderBy('id', 'desc')
			->paginate(10);

		return view('admin.feedback.index', compact('items'));
	}


	public function show($id)
	{
		$item = Feedback::find($id);


		return view('admin.feedback.show', compact('item'));
	}


	public function destroy($id)
	{
		Feedback::find($id)->delete();

		return redirect()->route('admin.feedback.index')->with('success', 'Заявка удалена');
	}


	public function changeChecked($id)
	{

		$item = Feedback::query()->findOrFail($id);
		$item->checked = 1;
		$item->save();

		return redirect()->route('admin.feedback.index')->with('success', 'Просмотрено');
		//создать роут на этот метод с Route::post

	}
}

