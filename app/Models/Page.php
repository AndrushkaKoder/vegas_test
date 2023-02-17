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

	public function getUrl()
	{
		if ($this->uri == '/') return $this->uri;

		return '/'.$this->uri;
	}
}
