<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Feedback extends Model
{
	use HasFactory;

	use FileTrait;

	protected $fillable = [
		'user_name',
		'user_phone',
		'user_email',
		'user_data',
		'checked',
		'feedback_type_id'
	];

	protected $casts = [
		'user_data' => 'array'
	];


	public function feedbackType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(FeedbackType::class);
	}


	public static function makeNew($type, $data, $fields)
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

		$validator = Validator::make($data, [
			'user_name' => 'required',
			'user_phone' => 'required',
			'user_data' => 'array'
		]);

		if ($validator->fails()) {
			throw new \Exception($validator->errors()->first());
		}

		$feedbackType = FeedbackType::where('title', $type)->first();
		$item = new Feedback();
		$item->feedback_type_id = $feedbackType ? $feedbackType->id : 0;
		$item->fill([
			'user_name' => request('user_name', ''),
			'user_phone' => request('user_phone', ''),
			'user_email' => request('user_email', ''),
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


