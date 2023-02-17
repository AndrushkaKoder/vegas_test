<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

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
		$item->update(['checked' => 1]);

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
		$item->update(request()->only('checked'));
	}
}

