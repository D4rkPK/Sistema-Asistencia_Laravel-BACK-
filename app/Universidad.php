<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    //
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
