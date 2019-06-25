<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use App\Seat;
use App\User;
use Carbon\Carbon;
use App\qr_code;
use App\Tariff;
use App\ReserveType;
use App\Http\Controllers\QrController;

class ReservationController extends Controller
{
	public function create ($fecha1 , $tiporeserva , $tarifa ,$plazadisponible){
    	// Carbon::now()->addDays(2)->addHour(3)->addMinutes(20); Metodo para agregar dias horas y minutos
		// subMinutes(20) elimina


    		// Se llama a todo los atributos de la tabla qr_code
			$db_qr_last = qr_code::All()->last()->id_qrcode; 	
    	    $plaza = Seat::where('state_seat', 0)->get(); // se consulta las plazas



    	    if (!$plaza->isEmpty()) {

    	    	$useronline = Auth::user()->id;
			$content = uniqid().uniqid();  		   // Genera Codigo unico
			$db_qr = new qr_code();
			$db_qr->content_qrcode = $content;  //Se Genera insercion a codigo QR
			$db_qr->count_qrcode = 0;
			$db_qr->save(); 

			$reserva = new Reserve;
			$reserva->id_tariff = $tarifa;
			$reserva->id_user = $useronline;
			$reserva->id_reservetype = $tiporeserva;
			$reserva->id_seat = $plazadisponible;
			$reserva->date_reserve = Carbon::now();
			$reserva->expiration_reserve = $fecha1;
			$reserva->activate_reserve = 1;
			$reserva->id_qrcode = $db_qr_last; //Busca el ultimo id del qr_code  
			$reserva->save();
			$plazaocupada = Seat::where('id_seat', $plazadisponible)->update(['state_seat' => 1]);
			$plazaestado = Seat::where('state_seat', 0)->first()->state_seat;
			$CreateQr =  new QrController();

		 	 return $CreateQr->create($content);  // Retorna al c

		 	} else {

		 		$respuestamala = "sin espacio ;(";
		 		return view('estacionapp.session.conductor.express')->with('respuesta', $respuestamala);
		 	}
		 }
		}
