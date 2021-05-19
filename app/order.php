<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=[
        'o_id','u_name','email','phone','address','total','user_id',
    ];


    public function users(){
        return $this->hasOne('App\User','id','user_id');
     }

}
