<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class area extends Model
{
    //
    use SoftDeletes;
    protected $table = 'area';
    protected $fillable = [
        'descripcion', 'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
        'deleted_at' => 'datetime:d-m-Y h:i:s'
    ];
}
