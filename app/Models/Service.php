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
	];

	protected static function booted()
	{
		parent::booted();

		static::creating(function ($service) {
			$service->attributes['slug'] = Str::slug($service->title);
		});
	}

	/*public static function makeNew($data, $fields)
	{
		$item = new self;
		foreach ($fields as $field) {
			if (isset($data[$field])) {

			}
		}

		$item->save();
		return $item;
	}*/


}
