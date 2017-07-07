<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

    	'matricula' , 'nombre', 'apellido', 'correo', 'estadistica', 'carrera_id', 'equipo_id'
    ];
}
