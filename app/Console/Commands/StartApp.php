<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class StartApp extends Command
{

	protected $signature = 'app:start';

	protected $description = 'command for clear seed and start application';

	public function handle()
	{
		File::deleteDirectory(public_path('assets/frontend/files/App/Models'));
		$this->call('migrate:fresh');
		$this->call('db:seed');
	}
}
