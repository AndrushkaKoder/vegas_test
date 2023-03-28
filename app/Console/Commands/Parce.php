<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class Parce extends Command
{

	protected $signature = 'app:parse';


	protected $description = 'parsing site';

	public function __construct()
	{
		parent::__construct();
	}


	public function handle()
	{

	}
}
