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
	   public function __construct()
    {
        $this->middleware(['auth','verified']);  //Middleware
		
    }


    public function create ( $expiration , $tiporeserva , $tarifa , $plazadisponible , $activate_reserve , $id_reservetype ){
    	// Carbon::now()->addDays(2)->addHour(3)->addMinutes(20); Metodo para agregar dias horas y minutos
		// subMinutes(20) elimina


    		$plaza = Seat::where('state_seat', 0)->get(); // se consulta las pla	

    		
    		if (!$plaza->isEmpty()) {


    		$useronline = Auth::user()->id;
			$content = uniqid().uniqid();  		   // Genera Codigo unico
			$db_qr = new qr_code();
			$db_qr->content_qrcode = $content;  //Se Genera insercion a codigo QR
			$db_qr->count_qrcode = 0;
			$db_qr->save(); 
    		// Se llama a todo los atributos de la tabla qr_code
			$db_qr_last = qr_code::All()->last()->id_qrcode; 	

			$reserva = new Reserve;
			$reserva->id_tariff = $tarifa;
			$reserva->id_user = $useronline;
			$reserva->id_reservetype = $tiporeserva;
			$reserva->id_seat = $plazadisponible;
			$reserva->date_reserve = Carbon::now();
			$reserva->expiration_reserve = $expiration;
			$reserva->activate_reserve = $activate_reserve;
			$reserva->id_qrcode = $db_qr_last; //Busca el ultimo id del qr_code  


		
			$reserva->save();
	
				# code...
		
			return $this->validates($content);

		 // Retorna al c



		 	} else {

		 		$respuestamala = "Sin Reservas Disponibles ;(";
		 		return view('estacionapp.session.conductor.express')->with('respuesta', $respuestamala);
		 	}
		 }




		 public function createExpress ($expiration , $tiporeserva , $tarifa ,$plazadisponible, $activate_reserve , $id_reservetype){

		 	 	//Se consulta en la db si la fecha introducida en el form existe en la db , como el id_reserva , y si el tipo se plaza es igual
		 	

			return	$this->create($expiration , $tiporeserva , $tarifa ,$plazadisponible , $activate_reserve , $id_reservetype );

		 }


		 public function createDayli ($expiration , $tiporeserva , $tarifa ,$plazadisponible,  $activate_reserve , $id_reservetype){

		 		 //Se consulta en la db si la fecha introducida en el form existe en la db , como el id_reserva , y si el tipo se plaza es igual
		 	$query = Reserve::where('activate_reserve' , $activate_reserve )->where('id_reservetype', $id_reservetype)->where('id_seat' , $plazadisponible)->get();  


		 	if(!$query->isEmpty()){
		 		return redirect()->back()->with('status','Plaza Nro° :'.$plazadisponible.' '.'Ya reservada para la Fecha :'.date_format($activate_reserve, 'd-m-Y'));
		 	} 
		 	return $this->create($expiration , $tiporeserva , $tarifa ,$plazadisponible , $activate_reserve , $id_reservetype );

		 }

		 public function validates($content) {
		 /* $query  Valida que la fecha dada en activate_reserve haya sido superada por la fecha actual */
		 	$query = Reserve::all()->where('activate_reserve', '<=' , Carbon::now()->addMinutes(0));    
		 	foreach ($query as $query_result ) {
		 		
		 		Seat::where('id_seat' ,$query_result->id_seat)->update(['state_seat' => 1]); //Se Ocupa la Plaza
		 	}
		 	 /* $query2  Valida que la fecha dada en expiration_reserve haya sido superada por la fecha actual */
		 	$query2 = Reserve::all()->where('expiration_reserve', '<=' , Carbon::now());    
		 	foreach ($query2 as $query_result2 ) {
		 		
		 		Seat::where('id_seat' ,$query_result2->id_seat)->update(['state_seat' => 0]); //Se libera la plaza
		 	}

		 		$CreateQr =  new QrController();

		 	 return $CreateQr->create($content); 

		 }




		}
