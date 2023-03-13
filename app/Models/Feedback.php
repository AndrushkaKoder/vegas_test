<?php

namespace App\Models;

use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Feedback extends BaseModel
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


	public static function makeNew($type, $data, $fields) //Обратная связь, $data, value = text
	{
		$res = [];

		foreach ($fields as $fieldName => $fieldTitle) {
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

	public function feedbackFilters()
	{

		$feedbackType = $this->feedbackType->title;
	}


//	Скоупы для фильтров
	public function scopeSHasCategories($query, $category)
	{
		return $query->where('feedback_type_id', $category);
	}

	public function scopeSHasPhone($query, $phone)
	{
		return $query->where('user_phone', ($phone ? '<>' : '='), '');
	}

	public function scopeSHasEmail($query, $email)
	{
		return $query->where('user_email', ($email ? '<>' : '='), '');
	}

	public function scopeSHasChecked($query, $checked)
	{
		$checked ? $query->where('checked', '1') : $query->where('checked', '0');
	}

	public function scopeSSort($query, $sort)
	{
		$str = $sort;
		$needle = substr($str, '0', strpos($str, '-'));
		$typeSort = substr($str, strpos($str, '-') + 1);

		$query->orderBy($needle, $typeSort);
	}

	public function scopeSHasSearch($query, $search)
	{
		$res = $search;
		$modelFields = ['user_name', 'user_phone', 'user_email'];

		return $query->where(function ($query) use ($modelFields, $res) {
			$query->where($modelFields[0], 'like', "%$res%");
			$query->orWhere($modelFields[1], 'like', "%$res%");
			$query->orWhere($modelFields[2], 'like', "%$res%");
		});
	}

}


