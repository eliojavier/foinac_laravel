<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accountings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('debe');
			$table->string('haber');
			$table->float('monto');
			$table->date('fecha');
			$table->string('descripcion');
			$table->integer('stock_id')->unsigned();
			$table->integer('payment_id')->unsigned();
			$table->integer('loan_id')->unsigned();
			$table->integer('currency_id')->unsigned();
			
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
		Schema::drop('accountings');
	}

}
