<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
USE Illuminate\Database\Eloquent\SoftDeletes;

class Universidad extends Model
{
    //
    use SoftDeletes;
    protected $table = 'universidad';

    protected $fillable = [
        'id', 'nombre'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];
}
