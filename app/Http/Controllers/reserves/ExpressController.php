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
use Illuminate\Support\Facades\DB;

class ExpressController extends Controller
{	


	public function create(Request $request){  //Reserva Express

		$request->user()->authorizeRoles(['user']);

		$expiration = Carbon::now()->addMinutes(10);  //Tiempo limite de expiracion
		$tarifa = Tariff::where('id_tariff', 1)->first()->id_tariff;   // Tipo de Tarifa
		$tiporeserva = ReserveType::where('id_reservetype', 1)->first()->id_reservetype; 	
		$plazadisponible = Seat::where('state_seat', 0)->first()->id_seat;
		$activate_reserve = Carbon::now();
		$id_reservetype = 1;
		$reserve = new ReservationController();

		return $reserve->create($expiration , $tarifa , $tiporeserva , $plazadisponible , $activate_reserve ); // Retorna a ReservationController
	}
		}
