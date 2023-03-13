<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
	use HasFactory;
	use FileTrait;

	protected $fillable = [
		'login',
		'password'
	];

	//Мутатор пароля
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}
}
