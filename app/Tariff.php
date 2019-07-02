<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariff';
    //Relacion uno a muchos RESERVAS
    public function reserves()
    {
        return $this->hasMany('App\Reserve');
    }
}
