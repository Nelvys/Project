<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioBasico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'medio_basico';

    protected $fillable = [
        'no_inventory', 'name_object', 'local_name','responsable','medio_basico_category_id'
    ];


}
