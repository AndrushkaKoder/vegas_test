<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Navigation extends BaseModel
{
	use HasFactory;

	public $timestamps = false;
	/**
	 * @var mixed
	 */

	protected $fillable = [
		'title',
		'url',
		'parent_id',
		'position',
		'navigable_id',
		'navigable_type'
	];

	public function __construct(array $attributes = [])
	{
		$this->setRawAttributes([
			'parent_id' => 0,
		]);

		parent::__construct($attributes);
	}

	public function parent()
	{
		return $this->belongsTo(self::class, 'parent_id');
	}

	public function children()
	{
		return $this->hasMany(self::class, 'parent_id');
	}

	public function childrenSorted()
	{
		return $this->children()->sSorted();
	}

	public function scopeSFirstLevel($query, $first = true)
	{
		if ($first)
			return $query->where('parent_id', '0');

		return $query->where('parent_id', '!=', '0');
	}


//	Полиморфная связь навигации

	public function navigable()
	{
		return $this->morphTo('navigable_type');
	}


	public function getNavPath()
	{
		if ($this->navigable) {
			return $this->navigable->uri;
		}

		return $this->url;
	}

}
