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
        //se Setea el la llave foranea de la reserva y  luego la llave primaria de la tabla tarifas Arreglar!!
        return $this->belongsTo(Tariff::class , 'id_tariff' , 'id_tariff' );
    }
    //Relacion muchos a uno TIPO RESERVAS
    public function reservetypes()
    {
        return $this->belongsTo(ReserveType::class , 'id_reservetype' , 'id_reserve');
    }
    //Relacion muchos a uno PLAZAS
    public function seats()
    {
        return $this->belongsTo(Seat::class, 'id_seat' , 'id_reserve');
    }
    //Relacion muchos a uno USUARIOS
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user' , 'id');
    }
    //Relacion muchos a uno QR'S
    public function qrcodes()
    {
        return $this->belongsTo(Qrcode::class, 'id_qrcode' , 'id_reserve');
    }

    public function reservestate(){

        return $this->belongsTo( ReserveState::class , 'id_reservestate' , 'id_reservestate');

    }
}
