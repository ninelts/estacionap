<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatSection extends Model
{
    protected $table = 'seat_section'; 
    public function seats()
    {
        return $this->hasMany('App\Seat' , 'id_seat' , 'id_seatsection');
    }  
}
