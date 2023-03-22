<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @mixin \Eloquent
 */
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
