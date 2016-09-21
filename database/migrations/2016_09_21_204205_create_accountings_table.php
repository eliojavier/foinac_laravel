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
			$table->integer('stock_id')->unsigned()->nullable();
			$table->integer('payment_id')->unsigned()->nullable();
			$table->integer('loan_id')->unsigned()->nullable();
			$table->integer('currency_id')->unsigned()->nullable();
			$table->integer('bank_interest_id')->unsigned()->nullable();
			$table->timestamps();
			
			$table->foreign('stock_id')
			      ->references('id')->on('stocks')
			      ->onDelete('cascade');

			$table->foreign('loan_id')
				->references('id')->on('loans')
				->onDelete('cascade');
			
			$table->foreign('payment_id')
			      ->references('id')->on('payments')
			      ->onDelete('cascade');
			
			$table->foreign('currency_id')
			      ->references('id')->on('currencies')
			      ->onDelete('cascade');
			
			$table->foreign('bank_interest_id')
			      ->references('id')->on('bank_interests')
			      ->onDelete('cascade');
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
