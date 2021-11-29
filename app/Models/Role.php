<?php

namespace App\Models;

use Highlight\ModeDeprecations;
use Illuminate\Database\Eloquent\Model;
//use Zizaco\Entrust\EntrustRole;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'display_name', 'description',
    ];

}
