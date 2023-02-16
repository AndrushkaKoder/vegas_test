<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

	protected $fillable = [
		'uri',
		'title',
		'seo_title',
		'seo_description',
		'seo_keywords',
		'content'
	];

	public static function whereUrl($url): \Illuminate\Database\Eloquent\Builder
	{
		return Page::query()->where('uri', $url);
	}
}
