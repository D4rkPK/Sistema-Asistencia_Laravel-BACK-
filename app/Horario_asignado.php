<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario_asignado extends Model
{
    //
    use SoftDeletes;
    protected $table = 'horario_asignado';
    protected $fillable = [
        'estudiante_id', 'horario_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'estudiante_id');
    }

    public function horario()
    {
        return $this->hasOne(Horario::class, 'id', 'horario_id');
    }

}
