<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = "orders";
    protected $fillable = 
    [
        'name','hp', 'produk','price','date_order','status'
    ];
}
