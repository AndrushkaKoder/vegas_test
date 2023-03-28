<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vendor
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Files> $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Vendor extends BaseModel
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'title'
	];

	public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Product::class);
	}

	protected $configSizeImages = [
		'inner' => [
			'medium' => [
				'resize' => ['width' => '410', 'height' => '50'],
				'ratio' => true
			],
			'small' => [
				'resize' => ['width' => '400', 'height' => '500'],
				'ratio' => true
			],
		],
		'outer' => [
			'medium' => [
				'resize' => ['width' => '400', 'height' => '500'],
				'ratio' => true
			],
			'small' => [
				'resize' => ['width' => '400', 'height' => '500'],
				'ratio' => true
			],
		]
	];
}
