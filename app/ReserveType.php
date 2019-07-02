<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveType extends Model
{
    protected $table = 'reserve_type';

    //Relacion uno a muchos RESERVAS
    public function reserves()
    {
        return $this-> hasMany('App\Reserve');
    }
}
