<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    protected $table="classes";
    protected $fillable=
    [
        'id','jenisCategory','category','deskripsi','name_ins','kuota','price','image','video'
    ];

}
