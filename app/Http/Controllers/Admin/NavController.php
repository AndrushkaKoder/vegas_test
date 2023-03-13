<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service;

class NavController extends BaseCrudController
{
	protected $model = Navigation::class;
	protected $sortable = true;

	public function getQuery()
	{
		return parent::getQuery()->sFirstLevel();
	}

	public function getValidationRules()
	{
		return [
			'title' => 'required',
			'url' => request()->url_check == '1' ? 'required' : ''
		];
	}

	public function getParams($method, $item = null)
	{
		$params = parent::getParams($method, $item);

		if (in_array($method, ['edit', 'create'])) {
			$params = [
				'navigableGroups' => $this->getNavigableGroups($item)
			];
		}

		return $params;
	}


	public function getNavigableGroups(Navigation $navigation)
	{
		$groups = [
			Page::class => ['title' => 'Страницы', 'items' => Page::all(),],
			Service::class => ['title' => 'Услуги', 'items' => Service::all(),],
		];

		foreach ($groups as $className => $group) {
			$loopFirst = $className == array_key_first($groups);
			$groups[$className]['show'] = (!$navigation->exists && $loopFirst)
				|| ($navigation->exists &&
					(
						($navigation->navigable_type && $navigation->navigable_type == $className)
						|| (!$navigation->navigable_type && $loopFirst)
					)
				);
		}

		return $groups;
	}

	public function getFillData()
	{
		$object_type = request('bind_to');
		$object_id = intval(request("bind_to_item.{$object_type}"));

		$fill = request()->only([
				'title',
			]) + [
				'position' => $this->getModel()::max('position') + 1,
			];

		if (request('url_check') === '0') {
			$fill += [
				'navigable_id' => $object_id,
				'navigable_type' => $object_type,
				'url' => '',
			];
		} else {
			$fill += [
				'navigable_id' => null,
				'navigable_type' => null,
				'url' => request('url'),
			];
		}

		return $fill;
	}

}
