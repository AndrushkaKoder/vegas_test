<?php

namespace App\Traits;

use App\Models\Params;

trait SeoTrait
{
	public function getSeoTitle()
	{
		if ($s = $this->seo_title) return $s;
		return "{$this->title} - " . Params::getValue('sitename');
	}

	public function getSeoDescription()
	{
		if ($description = $this->seo_description) return $description;
		return $this->title . ' - ' . Params::getValue('sitemane');
	}

	public function getSeoKeywords()
	{
		if ($keywords = $this->keywords) return $keywords;
		return $this->title . ' - ' . Params::getValue('sitename');
	}

	public function getSeoH1()
	{
		if($h1 = $this->h1) return $h1;
		return $this->title;
	}
}
