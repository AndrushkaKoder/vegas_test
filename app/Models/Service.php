<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

/**
 * App\Models\Service
 *
 * @property string $content
 * @method static Builder|Service query()
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $short_content
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Files> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\Navigation|null $navigation
 * @method static \Database\Factories\ServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereShortContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */

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
		'position',
		'slug',
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

	public function getUrl()
	{
		return route('frontend.service.show', $this->slug);
	}


}
