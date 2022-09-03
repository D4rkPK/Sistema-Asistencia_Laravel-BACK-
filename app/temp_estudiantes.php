<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_estudiantes extends Model
{
    //

    protected $table = 'temp_estudiantes';
    protected $fillable = ['id_estudiante'];

    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
