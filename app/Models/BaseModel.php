<?php

namespace App\Models;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	use SeoTrait;

	public function scopeSSorted($query, $order = 'asc')
	{
		if ($this->isFillable('position'))
			return $query->orderBy('position', $order);

		return $query->orderBy('id', $order);
	}

}
