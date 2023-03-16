<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Params
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Params newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Params newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Params query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Params whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Params whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Params whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Params whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Params whereValue($value)
 * @mixin \Eloquent
 */
class Params extends BaseModel
{
	use HasFactory;

	protected $fillable = [
		'name',
		'value'
	];
	
	static function getValue($names)
	{
		static $items = null;
		if (is_null($items))
			$items = self:: all()->keyBy('name')->pluck('value', 'name');

		$result = [];
		foreach ((array)$names as $name) {
			if (isset($items[$name]))
				$result[$name] = $items[$name];
		}

		if (count($result) == 1)
			return current($result);

		return $result;
	}
}
