<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //


    public function users(){
        return $this->belongsToMany('App\User');  //Funcion para asignar muchos a muchos a la tabla usuario
    }
}
