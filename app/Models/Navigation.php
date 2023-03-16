<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

/**
 * App\Models\Navigation
 *
 * @property int $id
 * @property string $title
 * @property string|null $url
 * @property int $parent_id
 * @property int $position
 * @property int|null $navigable_id
 * @property string|null $navigable_type
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Navigation> $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $navigable
 * @property-read Navigation|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation sFirstLevel($first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereNavigableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereNavigableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereUrl($value)
 * @mixin \Eloquent
 */
class Navigation extends BaseModel
{
	use HasFactory;

	public $timestamps = false;
	/**
	 * @var mixed
	 */

	protected $fillable = [
		'title',
		'url',
		'parent_id',
		'position',
		'navigable_id',
		'navigable_type'
	];

	public function __construct(array $attributes = [])
	{
		$this->setRawAttributes([
			'parent_id' => 0,
		]);

		parent::__construct($attributes);
	}

	public function parent()
	{
		return $this->belongsTo(self::class, 'parent_id');
	}

	public function children()
	{
		return $this->hasMany(self::class, 'parent_id');
	}

	public function childrenSorted()
	{
		return $this->children()->sSorted();
	}

	public function scopeSFirstLevel($query, $first = true)
	{
		if ($first)
			return $query->where('parent_id', '0');

		return $query->where('parent_id', '!=', '0');
	}


//	Полиморфная связь навигации

	public function navigable()
	{
		return $this->morphTo('navigable');
	}


	public function getNavPath()
	{
		if ($this->navigable) {
			if (method_exists($this->navigable, 'getUrl'))
				return $this->navigable->getUrl();
		}

		if (!Str::startsWith($this->url, 'http') && !Str::startsWith($this->url, '/'))
			return '/' . $this->url;

		return $this->url;
	}

	public function isCurrent($request)
	{
		$flag = false;
		if($request->is($this->url))
			$flag = true;

		foreach ($this->children as $item){
			if($request->is($item->url)){
				$flag = true;
			}
		}

//		$flag = false;
//
//		if ($request->is($this->url)) {
//			$flag = true;
//		} else {
//			foreach ($this->children as $item) {
//				if ($request->is($this->url && (str_contains($item->url, $this->url))))
//					$flag = true;
//			}
//		}
//
		return $flag;
	}

}
