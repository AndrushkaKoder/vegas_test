<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends BaseModel
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'title',
		'content',
		'link',
		'position',
		'visible'
	];

//	public function navigation()
//	{
//		return $this->morphOne(Navigation::class, 'navigable');
//	}


}
