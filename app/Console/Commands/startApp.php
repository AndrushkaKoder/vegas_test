<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class startApp extends Command
{

	protected $signature = 'startApp';

	protected $description = 'command for clear seed and start application';

	public function __construct()
	{
		parent::__construct();
	}


	public function handle()
	{
		$this->call('migrate:fresh');
		$this->call('db:seed');
		File::deleteDirectory(public_path('assets/frontend/files/App/Models'));
	}
}
