<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('loan_id');
			$table->float('montoCapital');
			$table->float('montoInteres');
			$table->date('fecha');
			$table->string('concepto')->nullable();
			$table->timestamps();

			$table->foreign('loan_id')
					->references('id')->on('loans')
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
		Schema::drop('payments');
	}

}
