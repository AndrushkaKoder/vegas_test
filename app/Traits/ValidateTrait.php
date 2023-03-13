<?php

namespace App\Traits;

trait ValidateTrait
{
	// Валидация услуг
	public function serviceValidateArray()
	{
		return request()->validate([
			'title' => 'required',
			'short_content' => 'required',
			'content' => 'required',
			'inner' => 'image',
			'outer' => 'image',
		]);
	}


//	Валидация страниц

}
