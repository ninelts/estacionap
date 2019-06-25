<?php

namespace App\Http\Controllers\reserves;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use Carbon\Carbon;
class DayliController extends Controller
{
	        public function __construct()
    {
        $this->middleware(['auth','verified']); 	   //Middleware
     // Se llama a la funcion AuthorizeRoles , quien esta le envia los roles a comparar
    }


    public function index (){

    	$plaza = Seat::all();
    	
    	return view('estacionapp.session.conductor.diaria')->with('plazas' , $plaza);

    }

    public function create (Request $request){

    		  //Reserva Diaria

    	$cont = Seat::All()->count();
		$fecha1 = implode( array_filter(array_except($request->all(), ['_token'])));
    	$fecha2 = strftime($fecha1);
    	
    		

		$carbon =Carbon::now();
    
		$a= $carbon->setDate($fecha2)->setTime(00, 00, 0)->toDateTimeString();
		dd($a);
		  //Tiempo limite de expiracion
		$tarifa = Tariff::where('id_tariff', 2)->first()->id_tariff;   // Tipo de Tarifa
		$tiporeserva = ReserveType::where('id_reservetype', 2)->first()->id_reservetype; 
		$plazadisponible = Seat::where('state_seat', 0)->first()->id_seat;
		$reserve = new ReservationController();
		$dd($a);
		return $reserve->create($fecha1 , $tarifa , $tiporeserva , $plazadisponible); // Retorna a ReservationController
	}
}
