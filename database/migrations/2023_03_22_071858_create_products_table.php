<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->decimal('price')->nullable();
			$table->decimal('discount_price')->nullable();
			$table->string('vendor_code')->nullable();
			$table->string('barcode', 100);
			$table->date('discount_date_start')->nullable();
			$table->date('discount_date_end')->nullable();
			$table->integer('vendor_id')->nullable()->index();
			$table->tinyInteger('visible')->default(1)->index();
			$table->text('seo_title');
			$table->text('seo_description');
			$table->text('seo_keywords');
			$table->text('slug');
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
		Schema::dropIfExists('products');
	}
}
