<?php

use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('grupos')->insert([
	  	'id' => 1,
	  	'nombre' => 'Grupo A',
	  	'descripcion' => 'Grupo A de la Segunda division',
	     ]);
        \DB::table('grupos')->insert([
	  	'id' => 2,
	  	'nombre' => 'Grupo B',
	  	'descripcion' => 'Grupo B de la Ssegunda division',
	     ]);
        \DB::table('grupos')->insert([
	  	'id' => 3,
	  	'nombre' => 'Grupo C',
	  	'descripcion' => 'Grupo C de la Segunda division',
	     ]);
        \DB::table('grupos')->insert([
	  	'id' => 4,
	  	'nombre' => 'Grupo D',
	  	'descripcion' => 'Grupo D de la Segunda division',
	     ]);
        \DB::table('grupos')->insert([
	  	'id' => 5,
	  	'nombre' => 'Grupo E',
	  	'descripcion' => 'Grupo E de la Segunda division',
	     ]);
        \DB::table('grupos')->insert([
	  	'id' => 6,
	  	'nombre' => 'Grupo F',
	  	'descripcion' => 'Grupo F de la Segunda division',
	     ]);
    }
}
