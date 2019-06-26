<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'service_detail';
    
    //Relacion uno a muchos RESERVAS
    public function reserves()
    {
        return $this-> hasMany('App\Reserve');
    }
}
