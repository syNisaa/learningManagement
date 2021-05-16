<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = 
    [
        'name', 'desc','price','image','status','name_pj','image_pj'
    ];
}
