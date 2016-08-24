<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asientos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('debe');
			$table->string('haber');
            $table->float('monto');
			$table->date('fecha');
			$table->string('descripcion');
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
		Schema::drop('asientos');
	}

}
