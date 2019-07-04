<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\qr_code;
use App\Seat;
use App\Tariff;
use Illuminate\Support\Facades\Auth;
class ReadqrController extends Controller
{
    public function read() {

    	$id_user = Auth::user()->id;
    		

    	// Capaturamos el id para consultar todas las reservas del usuario donde las reservas sean activas o en espera --- WHEREBEETEWN
    	$reserves = Reserve::where('id_user' , $id_user)->where('id_reservestate' , 1)->get();
		
		foreach ($reserves as $reserve ) {
				

				$id_seat 			= $reserve->id_seat; //id Plaza
				$id_tariff			= $reserve->id_tariff; // id Tarifa
				$date_reserve 		= $reserve->date_reserve; // Fecha Reserva
				$id_qrcode 			= $reserve->id_qrcode; // id QR
				$expiration_reserve	= $reserve->expiration_reserve; // Fecha expiracion
				$activate_reserve	= $reserve->activate_reserve; // Fecha Activacion
				$state_reserve 		= $reserve->id_reservestate;  // Estado reserva

			 	$tariff_name =Tariff::where('id_tariff' , 1 )->first()->name_tariff;
			 	
			 

		}

		return redirect()->route('datosUsuario')->with('id_seat', $id_seat ) ;
    }
}
