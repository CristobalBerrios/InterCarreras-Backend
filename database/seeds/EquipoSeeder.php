<?php

use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('equipos')->insert([
	  	'id' => 1,
	  	'nombre' => 'Informatica FC',
        'estadistica'=> '{"puntos":0}',
        'grupo_id'=> 1
	     ]);
	 \DB::table('equipos')->insert([
	  	'id' => 2,
	  	'nombre' => 'IC Electrica',
        'estadistica'=> '{"puntos":0}',
        'grupo_id'=> 1
	     ]);
    }
}
