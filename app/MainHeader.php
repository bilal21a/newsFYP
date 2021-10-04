<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainHeader extends Model
{
    protected $fillable = [
        'cat_name', 'section', 'order'
    ];
}
