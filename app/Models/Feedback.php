<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_name',
		'user_phone',
		'user_email',
		'user_data'
	];

	protected $casts = [
		'user_data' => 'array'
	];


	public static function makeNew(FeedbackForm $type, $data, $fields)
	{
		$res = [];

		foreach ($fields as $fieldName => $fieldTitle) { //'user_name' => 'услуга'
			if (isset($data[$fieldName])) {
				$res[] = [
					'title' => $fieldTitle,
					'value' => $data[$fieldName]
				];
			}
		}

		request()->validate([
			'user_name' => 'required',
			'user_phone' => 'required',
			'user_data' => 'array'
		]);

		$item = new Feedback();
		$item->type_id = $type->id;
		$item->fill([
			'user_name' => request('user_name'),
			'user_phone' => request('user_phone'),
			'user_email' => request('user_email'),
			'user_data' => $res
		])->save();

		return $item;
	}

	public function getData()
	{
		$fields = ['user_name' => 'Имя', 'user_phone' => 'Телефон', 'user_email' => 'E-mail'];
		foreach ($fields as $k => $v) {
			$res[$v] = $this->getAttribute($k);
		}
		foreach ($this->user_data as $ud) {
			$res[$ud['title']] = $ud['value'];
		}

		return $res;
	}


}


