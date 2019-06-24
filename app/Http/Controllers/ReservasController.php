<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use App\Seat;
use App\User;
use App\qr_code;
use App\Tariff;
use App\ReserveType;
use App\Http\Controllers\QrController;

class ReservasController extends Controller
{	

	public function __construct()
	{
		$this->middleware(['auth','verified']);
		

	}

	public function express(){  //Reserva Express


		$fecha = date("Y/m/d H:i:s"); // Fecha y Hora
		$fecha1= strtotime ( '+1 day' , strtotime ($fecha));  // Se setea 1 dia mas a la fecha
		$fecha1= strtotime ( '+11 hour' , strtotime ($fecha)); // Se setea + horas a la fecha 
		$fecha1= date('Y/m/d H:i:s', $fecha1); // Se Captura dia y horas seteadas 

		$plazadisponible = Seat::where('state_seat', 0)->get();
		if (!$plazadisponible->isEmpty()) {
		 	
			$content = uniqid().uniqid();  		   // Genera Codigo unico
		 	$db_qr = new qr_code();
			$db_qr->content_qrcode = $content;
			$db_qr->count_qrcode = 0;
        	$db_qr->save(); 
        	$db_qr_last = qr_code::All();

			$plazadisponible = Seat::where('state_seat', 0)->first()->id_seat;
			$useronline = Auth::user()->id;
			$tarifa = Tariff::where('id_tariff', 1)->first()->id_tariff;
			$tiporeserva = ReserveType::where('id_reservetype', 1)->first()->id_reservetype;
			$reserva = new Reserve;
			$reserva->id_tariff = $tarifa;
			$reserva->id_user = $useronline;
			$reserva->id_reservetype = $tiporeserva;
			$reserva->id_seat = $plazadisponible;
			$reserva->date_reserve = date("Y/m/d H:i:s");
			$reserva->expiration_reserve = $fecha1;
			$reserva->activate_reserve = 1;
			$reserva->id_qrcode = $db_qr_last->last()->id_qrcode;  
			$reserva->save();
			$plazaestado = Seat::where('state_seat', 0)->first()->state_seat;
			$plazaocupada = Seat::where('id_seat', $plazadisponible)->update(['state_seat' => 1]);
			$CreateQr =  new QrController();

		 	 return $CreateQr->create($content);  // Retorna al controlador QrController Funcion create 

		} else {
			$respuestamala = "sin espacio ;(";
			return view('estacionapp.session.conductor.express')->with('respuesta', $respuestamala);
		}

	}

	public function daily(){ //Reserva Diaria




		$fecha = date("Y/m/d H:i:s"); // Fecha y Hora
		$fecha1= strtotime ( '+1 day' , strtotime ($fecha));  // Se setea 1 dia mas a la fecha
		$fecha1= strtotime ( '+11 hour' , strtotime ($fecha)); // Se setea + horas a la fecha 
		$fecha1= date('Y/m/d H:i:s', $fecha1); // Se Captura dia y horas seteadas 


		$plazas = DB::table('seat')->get();
		$secciones = DB::table('seat_section')->get();
		$plazas1 = DB::table('seat')->select()->whereNotIn('state_seat', [1])->get();
		$fecha = date("Y/m/d");
		$fecha1= strtotime ( '+1 day' , strtotime ($fecha));
		$fecha1= date('Y/m/d', $fecha1);
		dd($fecha1);
		return view('estacionapp.session.conductor.diaria', ['plazas' => $plazas]);
	}

	public function monthly(){ //Reserva Mensual

		
	}

	public function compare(){

		$reserve = new Reserve;
		$date_reserve = $reserve->date_reserve; 
		$date_expiration = $reserve->expiration_reserve;
		$date = now();
	
		if ($date > $date_expiration) {
			
	

		}

	}
}
