<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel
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

	public function getUrl()
	{
		if ($this->uri == '/') return $this->uri;

		return '/' . $this->uri;
	}

	public function navigation()
	{
		return $this->morphOne(Navigation::class, 'navigable');
	}


	public function getSeoDescription()
	{
		if ($description = $this->seo_description) return $description;
		return 'Дефолтное сео поле с описанием ' . Params::getValue('sitename');
	}

	public function getSeoH1()
	{
		if ($h1 = $this->h1) return $h1;
		return 'Клубника бомба, честно говоря';
	}

}
