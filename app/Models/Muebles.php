<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muebles extends Model
{
    protected $table = 'medio_basico';

    protected $fillable = [
        'description', 'material', 'status_id'
    ];
}
