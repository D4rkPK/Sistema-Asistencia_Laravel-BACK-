<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    //
    use SoftDeletes;
    protected $table = 'estudiante';
    protected $fillable = [
        'cui', 'universidad_id', 'area_id', 'nombre', 'apellido', 'carne', 'correo', 'huella',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];

    public function universidad()
    {
        return $this->hasOne(Universidad::class, 'id', 'universidad_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'area_id');
    }
}
