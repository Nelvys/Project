<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioBasicoCategory extends Model
{
    public const REGISTERED_STATUS ='MUEBLES';
    public const APPLIED_STATUS = 'EQUIPOS ELECTRONICOS';


    protected $table = 'medio_basico_category';

    protected $fillable = [
        'name',
    ];


}
