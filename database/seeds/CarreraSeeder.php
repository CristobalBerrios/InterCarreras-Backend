<?php

use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	 \DB::table('carreras')->insert([
	  	'id' => 1,
	  	'nombre' => 'Ingenieria Informatica',
	     ]);
	 \DB::table('carreras')->insert([
	  	'id' => 2,
	  	'nombre' => 'Ingenieria civil Informatica',
	     ]);
	 \DB::table('carreras')->insert([
	  	'id' => 3,
	  	'nombre' => 'Ingenieria civil Electronica',
	     ]);
	 \DB::table('carreras')->insert([
	  	'id' => 4,
	  	'nombre' => 'Ingenieria civil Electrica',
	     ]);
	 \DB::table('carreras')->insert([
	  	'id' => 5,
	  	'nombre' => 'Ingenieria civil Telematica',
	     ]);
    }
}
