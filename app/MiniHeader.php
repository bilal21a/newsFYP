<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniHeader extends Model
{
    protected $fillable = [
        'source_name', 'source_api_name', 'order', 'icon'
    ];
}
