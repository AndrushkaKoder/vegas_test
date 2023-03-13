<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Models\FeedbackType;

class FeedbackController extends BaseCrudController
{
	protected $model = Feedback::class;

	public function afterShow($item)
	{
		$item->update(['checked' => 1]);
	}

	public function getFilterData()
	{
		return [
			[
				'label' => 'Категории',
				'name' => 'category',
				'data' => ['-1' => 'Не выбрано'] + FeedbackType::query()->pluck('title', 'id')->toArray(),
				'callback' => function ($query, $value) {
					return $query->sHasCategories($value);
				},
			],
			[
				'label' => 'Телефон',
				'name' => 'phone',
				'data' => ['-1' => 'Не выбрано', '0' => 'Без телефона', '1' => 'С телефоном'],
				'callback' => function ($query, $value) {
					return $query->sHasPhone($value);
				},

			],
			[
				'label' => 'Почта',
				'name' => 'email',
				'data' => ['-1' => 'Не выбрано', '0' => 'Без почты', '1' => 'С почтой'],
				'callback' => function ($query, $value) {
					return $query->sHasEmail($value);
				},
			],
			[
				'label' => 'Прочитано',
				'name' => 'checked',
				'data' => ['-1' => 'Не выбрано', '0' => 'Непрочитано', '1' => 'Прочитано'],
				'callback' => function ($query, $value) {
					return $query->sHasChecked($value);
				},
			],
		];
	}

	public function getSortData()
	{
		return [
			[
				'label' => 'Сортировка',
				'name' => 'sort',
				'data' => [
					'id-desc' => 'Сначала новые',
					'id-asc' => 'Сначала старые',
					'user_name-asc' => 'Имя А-Я',
					'user_name-desc' => 'Имя Я-А',
				],
				'default_selected' => 'id-desc',
				'callback' => function ($query, $value) {
					return $query->sSort($value);
				},
			]
		];
	}
}


