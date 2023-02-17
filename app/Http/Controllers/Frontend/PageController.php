<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function showPage($uri)
	{
		$page = Page::whereUri($uri)->firstOrFail();
		return view("frontend.pages.show.show", compact('page'));
	}

	public function about()
	{
		$page = Page::whereUri('about')->firstOrFail();
		return view('frontend.pages.system.about.index', compact('page'));
	}

	public function aboutData()
	{
		request()->validate([
			'user_name' => 'required',
			'user_phone' => 'required',
			'user_email' => 'required',
		]);

		$feedback = new Feedback();
		$userData = [['title' => request()->title], ['value' => request()->text]];
		$feedback->fill([
			'user_name' => request()->user_name,
			'user_phone' => request()->user_phone,
			'user_email' => request()->user_email,
			'user_data' => $userData,
			'feedback_type_id' => request()->feedback_type_id ?? 2
		])->save();
		$feedback->saveUserFile(request()->file);

		return redirect()->route('frontend.about')->with('success', 'Спасибо за ваш отзыв');

	}

}
