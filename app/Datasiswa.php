<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    protected $table="datasiswa";
    protected $fillable=
    [
        'id','name','email','class_category','date','status'
    ];
}
