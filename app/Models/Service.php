<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

class Service extends Model
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'title',
		'short_content',
		'content',
		'seo_title',
		'seo_description',
		'seo_keywords',
		'position'
	];

	protected static function booted()
	{
		parent::booted();

		static::creating(function ($service) {
			$service->attributes['slug'] = Str::slug($service->title);
		});
	}

	public function navigation()
	{
		return $this->morphOne(Navigation::class, 'navigable');
	}

	public function scopeSSorted($query, $order = 'asc')
	{
		return $query->orderBy('position', $order);
	}



}
