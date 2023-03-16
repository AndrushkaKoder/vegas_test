<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $uri
 * @property string $title
 * @property string|null $h1
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Navigation|null $navigation
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUri($value)
 * @mixin \Eloquent
 */
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
