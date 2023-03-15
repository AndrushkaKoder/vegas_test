<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

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
		return $this->morphTo('navigable');
	}


	public function getNavPath()
	{
		if ($this->navigable) {
			if (method_exists($this->navigable, 'getUrl'))
				return $this->navigable->getUrl();
		}

		if(!Str::startsWith($this->url,'http') && !Str::startsWith($this->url, '/'))
			return '/' . $this->url;

		return $this->url;
	}

}
