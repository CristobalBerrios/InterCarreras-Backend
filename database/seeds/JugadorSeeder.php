<?php

use Illuminate\Database\Seeder;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jugadores')->insert([
	  	'id' => 1,
	  	'matricula' => '12345678',
        'nombre' => 'Adrian',
        'apellido' => 'Herrera',
        'correo' => 'a.herrera04@ufromail.cl',
        'estadistica' => '{"goles":10,"amarilla":0,"roja":0}',
        'carrera_id' => 1,
        'equipo_id' => 1,
	     ]);
        \DB::table('jugadores')->insert([
	  	'id' => 2,
	  	'matricula' => '12345678',
        'nombre' => 'Cristobal',
        'apellido' => 'Berrios',
        'correo' => 'c.berrios04@ufromail.cl',
        'estadistica' => '{"goles":5,"amarilla":0,"roja":0}',
        'carrera_id' => 1,
        'equipo_id' => 1,
	     ]);
        \DB::table('jugadores')->insert([
	  	'id' => 3,
	  	'matricula' => '12345678',
        'nombre' => 'Marcos',
        'apellido' => 'Pinilla',
        'correo' => 'm.pinilla04@ufromail.cl',
        'estadistica' => '{"goles":10,"amarilla":0,"roja":0}',
        'carrera_id' => 1,
        'equipo_id' => 1,
	     ]);
    }
}
