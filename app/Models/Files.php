<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * App\Models\Files
 *
 * @property int $id
 * @property string $filename
 * @property string $name
 * @property int $imageable_id
 * @property string $imageable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $object
 * @method static \Database\Factories\FilesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Files newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Files query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Files whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Files extends BaseModel
{
	use HasFactory;

	protected $fillable = [
		'name',
		'filename',
	];


	public function object(): \Illuminate\Database\Eloquent\Relations\MorphTo
	{
		return $this->morphTo();
	}

	public function getPath($size, $relative = true)
	{
		$path = "/assets/frontend/files/$this->imageable_type/$this->imageable_id/$this->name/$size/$this->filename";
		$path = str_replace('\\', '/', $path);

		if ($relative) {
			return $path;
		}

		return public_path($path);
	}

}
