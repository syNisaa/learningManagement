<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    protected $table = "testimonis";
    protected $fillable=
    [
        'name','classCategory', 'image','desc'
    ];
}
