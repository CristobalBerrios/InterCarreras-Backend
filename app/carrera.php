<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table = 'carreras';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre'
    ];
}
