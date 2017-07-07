<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

    	'nombre', 'descripcion'

    ];
}
