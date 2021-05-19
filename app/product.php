<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='products';
    protected $fillable=[
        'id','name','price','image'
    ];
}
