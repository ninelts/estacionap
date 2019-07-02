<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public $timestamps = false;
    protected  $primaryKey = 'id_seat';
    protected $table = 'seat';
    protected $fillable = [
        'state_seat'
    ];

    //Relacion muchos a uno SECCIONES PLAZA
    public function seatsections()
    {
       return $this->hasMany('App\SeatSection' , 'id_seatsection' , 'id_seat');
    }

     public function reserves()
    {
       return $this->hasMany('App\Reserve' , 'id_reserve' , 'id_seat');
    }
}
