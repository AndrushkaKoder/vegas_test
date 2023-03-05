<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\FeedbackType;


class FeedbackController extends Controller
{

	public function index()
	{
		$items = Feedback::query()
			->orderBy('id', 'desc')
			->paginate(10);

		if(request()->has('category')){
			$items = $this->sortFeedback();
		}

		$feedbackType = FeedbackType::all();

		return view('admin.feedback.index', compact('items', 'feedbackType'));
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


	public function sortFeedback()
	{
		return Feedback::query()
			->orderBy('id', 'desc')
			->whereIn('feedback_type_id', request('category'))->paginate(10);
	}

}

