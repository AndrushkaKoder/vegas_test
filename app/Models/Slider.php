<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $link
 * @property int $position
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $button
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Files> $files
 * @property-read int|null $files_count
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereVisible($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Files> $files
 * @method static \Illuminate\Database\Eloquent\Builder|Slider sHasPhoto()
 * @mixin \Eloquent
 */
class Slider extends BaseModel
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'title',
		'content',
		'link',
		'position',
		'visible',
		'button'
	];

	protected $configSizeImages = [
		'inner' => [
			'medium' => [
				'resize' => ['width' => '1920', 'height' => '1080'],
				'ratio' => true
			],
		],
	];

	public function scopeSHasPhoto($query)
	{
		return $query->whereHas('files', function ($query) {
			return $query->where('name', 'inner');
		});
	}

}
