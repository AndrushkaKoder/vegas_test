<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
	use HasFactory;

	public $timestamps = false;

	protected $fillable = [
		'title',
		'url',
		'parent_id',
		'position'
	];

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

	public function scopeSSorted($query, $order = 'asc')
	{
		return $query->orderBy('position', $order);
	}

	public static function getNav()
	{
		return self::query()
			->sFirstLevel()
			->sSorted()
			->get();
	}
}
