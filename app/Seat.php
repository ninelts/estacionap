<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public $timestamps = false;
    protected $table = 'seat';
    protected $fillable = [
        'state_seat'
    ];
}
