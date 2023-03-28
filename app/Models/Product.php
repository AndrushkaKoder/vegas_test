<?php

namespace App\Models;

use App\Traits\FileTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int|null $discount_price
 * @property string $vendor_code
 * @property string $barcode
 * @property string|null $discount_date_start
 * @property string|null $discount_date_end
 * @property int|null $vendor_id
 * @property int $visible
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Files> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\Vendor|null $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVendorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVisible($value)
 * @mixin \Eloquent
 */
class Product extends BaseModel
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'title',
		'description',
		'price',
		'discount_price',
		'vendor_code',
		'barcode',
		'discount_date_start',
		'discount_date_end',
		'vendor_id',
		'visible',
		'seo_title',
		'seo_description',
		'seo_keywords'
	];

	public function __construct(array $attributes = [])
	{
		$this->attributes['visible'] = 1;
		parent::__construct($attributes);
	}

	public function setDiscountDateStartAttribute($value)
	{
		if (empty($value)) {
			$this->attributes['discount_date_start'] = null;
		} else {
			$this->attributes['discount_date_start'] = date('Y-m-d', strtotime($value));
		}
	}

	public function setDiscountDateEndAttribute($value)
	{
		if (empty($value)) {
			$this->attributes['discount_date_end'] = null;
		} else {
			$this->attributes['discount_date_end'] = date('Y-m-d', strtotime($value));
		}
	}


	protected $configSizeImages = [
		'inner' => [
			'medium' => [
				'resize' => ['width' => '411', 'height' => '50'],
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

	public function vendor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Vendor::class)->withDefault();
	}

	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
	{
		return $this->belongsToMany(Category::class);
	}

	protected static function booted()
	{
		parent::booted();

		static::creating(function ($product) {
			$product->attributes['slug'] = Str::slug($product->title);
		});
	}

	public function discount()
	{
		if (!is_null($this->discount_price)) {
			$today = Carbon::now()->format('Y-m-d');
			$startDiscount = Carbon::parse($this->discount_date_start)->format('Y-m-d');
			$endDiscount = Carbon::parse($this->discount_date_end)->format('Y-m-d');
			return $today <= $endDiscount && $today >= $startDiscount;
		}
		return false;
	}

}
