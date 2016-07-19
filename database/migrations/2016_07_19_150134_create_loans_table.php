<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('stockholder_id');
            $table->date('fecha');
            $table->float('monto');
			$table->boolean('fuePagado')->default(0);
			$table->timestamps();

			$table->foreign('stockholder_id')
					->references('id')->on('stockholders')
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
		Schema::drop('loans');
	}

}
