<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    //
    use SoftDeletes;

    protected $table = 'registro';

    protected $fillable = [
        'horario_asignado_id', 'entrada', 'salida', 'fecha',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];

    public function horario_asignado()
    {
        return $this->hasOne(Horario_asignado::class, 'id', 'horario_asignado_id');
    }

    public function estudiante ()
    {
        return $this->hasOneThrough(Estudiante::class, Horario_asignado::class, 'id', 'id', 'horario_asignado_id', 'estudiante_id');
    }
}
