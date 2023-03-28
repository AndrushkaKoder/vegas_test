<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigations', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('url')->nullable();
			$table->integer('parent_id');
			$table->integer('position');
			$table->integer('navigable_id')->nullable();
			$table->string('navigable_type')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('navigations');
	}
}
