<?php

namespace App\Http\Composer\admin\header;

use App\Models\Feedback;
use Illuminate\View\View;

class AdminHeader
{
	public function compose(View $view)
	{
		$view->with('notifications', $this->getNotifications());
	}

	public function getNotifications(): \Illuminate\Database\Eloquent\Builder
	{
		return Feedback::query()->where('checked', 0);
	}

}
