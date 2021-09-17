<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'system_name', 'favicon', 'front_logo','admin_logo'
    ];
}
