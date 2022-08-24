<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario_asignado extends Model
{
    //
    protected $table = 'horario_asignado';
    protected $fillable = [
        'id', 'estudiante_id', 'horario_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];
}
