<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
