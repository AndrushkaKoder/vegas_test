<?php

namespace App\Traits;

trait UseTrait
{
	public function useTrait($trait)
	{
		$uses = class_uses($this);
		return isset($uses[$trait]);
	}
}
