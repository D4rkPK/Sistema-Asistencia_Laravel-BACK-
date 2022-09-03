<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp_estudiantes extends Model
{
    //

    protected $table = 'temp_estudiante';
    protected $fillable = ['estudiante_id'];

    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'id_estudiante');
    }
}
