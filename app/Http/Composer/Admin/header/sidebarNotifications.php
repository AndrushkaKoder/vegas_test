<?php

namespace App\Http\Composer\Admin\header;

use App\Models\Feedback;
use Illuminate\View\View;

class sidebarNotifications
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
