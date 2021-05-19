<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable=[
        'c_id','name','price','image','quantity','o_id',
    ];
}
