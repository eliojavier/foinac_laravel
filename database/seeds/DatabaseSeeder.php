<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table('stockholders')->insert(['name' => 'Jorge Alejandro']);
        DB::table('stockholders')->insert(['name' => 'Eladia']);
        DB::table('stockholders')->insert(['name' => 'Géison']);
        DB::table('stockholders')->insert(['name' => 'Jorge']);
        DB::table('stockholders')->insert(['name' => 'Estic']);
        DB::table('stockholders')->insert(['name' => 'Andrea']);
        DB::table('stockholders')->insert(['name' => 'Elio']);
        DB::table('stockholders')->insert(['name' => 'Nicole']);
	}
}
