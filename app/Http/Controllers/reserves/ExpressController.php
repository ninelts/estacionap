<?php

namespace App\Http\Controllers\reserves;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserve;
use App\Seat;
use App\User;
use Carbon\Carbon;
use App\qr_code;
use App\Tariff;
use App\ReserveType;
use App\Http\Controllers\ReservationController;

class ExpressController extends Controller
{	

	public function __construct()
	{
		$this->middleware(['auth','verified']);
		$this->compareExpress();

	}

	public function create(){  //Reserva Express

		$plaza = Seat::where('state_seat', 0)->get();
		$expiration = Carbon::now()->addMinutes(10);  //Tiempo limite de expiracion
		$tarifa = Tariff::where('id_tariff', 1)->first()->id_tariff;   // Tipo de Tarifa
		$tiporeserva = ReserveType::where('id_reservetype', 1)->first()->id_reservetype; 
		$plazadisponible = Seat::where('state_seat', 0)->first()->id_seat;

		$reserve = new ReservationController();
		return $reserve->create($expiration , $tarifa , $tiporeserva , $plazadisponible , $plaza); // Retorna a ReservationController
	}


	public function compareExpress(){

		$reserve = new Reserve;
		$carbon = Carbon::now();
		
		//Consulta en la db si la fecha actual es mayor a la fecha de expiracion , omite las reservas activas con valor 0 , y consulta que el tipo de reserva sea express 
		$query = Reserve::all()->where('expiration_reserve', '<' , Carbon::now())->where('id_reservetype', 1)->whereNotIn('activate_reserve', [0]);   

		//Recorre un arreglo para traer todas las consultas que tengan el formato de la query
		foreach ($query as $query_result ) {  


			// Comprueba si la fecha de expiracion paso
			if ($query_result->expiration_reserve <= $carbon) { 


				/*Actualiza  la activacion de la reserva*/
				Reserve::where('id_reserve' , $query_result->id_reserve)->update(['activate_reserve' => 0]); 


				 //Se Cambia el estado de la plaza
				Seat::where('id_seat' ,$query_result->id_seat)->update(['state_seat' => 0]);		
			}
			
		}



	}
}
