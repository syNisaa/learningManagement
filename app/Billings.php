<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    protected $table = "billings";
    protected $fillable = 
    [
        'name','class','price','date'
    ];
}
