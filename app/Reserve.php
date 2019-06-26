<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public $timestamps = false;
    protected $table = 'reserve';

    //Relacion muchos a uno TARIFAS
    public function tariffs()
    {
        return $this-> belongsTo('App\Tariff', 'id_tariff');
    }
    //Relacion muchos a uno TIPO RESERVAS
    public function reservetypes()
    {
        return $this-> belongsTo('App\ReserveType', 'id_reservetype');
    }
    //Relacion muchos a uno PLAZAS
    public function seats()
    {
        return $this-> belongsTo('App\Seat', 'id_seat');
    }
    //Relacion muchos a uno USUARIOS
    public function users()
    {
        return $this-> belongsTo('App\User', 'id_user');
    }
    //Relacion muchos a uno QR'S
    public function qrcodes()
    {
        return $this-> belongsTo('App\Qrcode', 'id_qrcode');
    }
}
