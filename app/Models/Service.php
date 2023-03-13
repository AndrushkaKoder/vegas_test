<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

class Service extends BaseModel
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


	public function getSeoTitle()
	{
		if ($s = $this->seo_title) return $s;
		return "Услуги {$this->title} в Калуге - " . Params::getValue('sitename');
	}

	public function getSeoDescription()
	{
		if ($description = $this->seo_description) return $description;
		return 'Описание услуги xxxx ' . $this->description . ' в городе Калуга';
	}

	public function getSeoKeywords()
	{
		return $this->seo_keywords;
	}

	public function getSeoH1()
	{
		return $this->title;
	}

}
