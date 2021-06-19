<?php

  

namespace App;


use Illuminate\Database\Eloquent\Model;

   

class Cancha extends Model

{

    protected $fillable = [

        'nombre_del_predio', 'detalles_de_canchas', 'user_id', 'imagen'

    ];
    
    public function usuario(){
        return $this->belongsTo(Users::class);
    }
    

}