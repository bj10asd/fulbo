<?php

  

namespace App;

  

use Illuminate\Database\Eloquent\Model;

   

class Users extends Model

{

    protected $fillable = [

        'user_id','name',

    ];
    public function canchas(){
        return $this->hasMany(Cancha::class);
    }
}