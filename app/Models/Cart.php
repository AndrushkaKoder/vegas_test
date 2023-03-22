<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends BaseModel
{
	use HasFactory;

	protected $table = 'cart';

	protected $fillable = [
		'title',
		'description',
		'price',
		'count'
	];
}
