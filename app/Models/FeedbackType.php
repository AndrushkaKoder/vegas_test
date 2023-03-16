<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FeedbackType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Feedback> $feedback
 * @property-read int|null $feedback_count
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel sSorted($order = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeedbackType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FeedbackType extends BaseModel
{
    use HasFactory;

	protected $fillable = [
		'title',
	];

	public function feedback()
	{
		return $this->hasMany(Feedback::class);
	}
}
