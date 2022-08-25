<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Puesto extends Model
{
    use SoftDeletes;

    protected $table = 'puesto';
    protected $fillable = [
        'descripcion'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];
}
