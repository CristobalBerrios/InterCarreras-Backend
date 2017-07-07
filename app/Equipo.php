<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre', 'estadistica', 'grupo_id'
    ];
}
