<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public const GOOD_STATUS ='GOOD';
    public const REGULAR_STATUS = 'REGULAR';


    protected $table = 'status';

    protected $fillable = [
        'name',
    ];

}
