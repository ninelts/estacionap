<?php

namespace App\Http\Controllers\reserves;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use App\Tariff;
use App\ReserveType;
use Carbon\Carbon;
use DateTime;
use App\Http\Controllers\ReservationController;

class DayliController extends Controller
{
   public function __construct(){
        $this->middleware(['auth','verified']); 	   //Middleware
     // Se llama a la funcion AuthorizeRoles , quien esta le envia los roles a comparar
    }


    public function index (Request $request){

       $request->user()->authorizeRoles(['user']);
    	$plaza = Seat::all();
    	$carbon = Carbon::now();
    	return view('estacionapp.session.conductor.diaria')->with('plazas' , $plaza);

    }

    public function create (Request $request){

    		  //Reserva Diaria

    	foreach ($request->input('dateFechaReserva') as $array ) {

            $fecha1 = $array;/* Traemos la Fecha obtenida en el array*/
        }

        foreach ($request->input('plaza') as $array2 ) {

              $id_seat = $array2; // Traemos la plaza obtenida
        }

        if ($fecha1 >= Carbon::now()) {
        $DateTime = new DateTime($fecha1); // Se Setea fecha a DateTime
        $activate_reserve = $DateTime;   //  Capturamos Fecha de Reserva
        $expiration =  Carbon::instance($DateTime)->addHours(21);//Tiempo limite de la expiracion 9:00 pm ;
        $tarifa = Tariff::where('id_tariff', 2)->first()->id_tariff;   // Tipo de Tarifa
        $tiporeserva = ReserveType::where('id_reservetype', 2)->first()->id_reservetype; 
        $plazadisponible = Seat::where('id_seat', $id_seat )->first()->id_seat;
        $reserve = new ReservationController();
        $id_reservetype = 2;
        $state_seat = Seat::where('id_seat', $plazadisponible)->first()->state_seat;

        return $reserve->createDayli($expiration , $tarifa , $tiporeserva , $plazadisponible , $activate_reserve , $id_reservetype); // Retorna a ReservationController
}else {
        return redirect()->back()->with('status', 'La Fecha ingresada es incorrecta');
}

	}


    public function compareDayli(){

        $reserve = new Reserve;
        $carbon = Carbon::now();
        
        //Consulta en la db si la fecha actual es mayor a la fecha de expiracion , omite las reservas activas con valor 0 , y consulta que el tipo de reserva sea express 
        $query = Reserve::all()->where('expiration_reserve', '<' , Carbon::now())->where('id_reservetype', 2);   

        //Recorre un arreglo para traer todas las consultas que tengan el formato de la query
        foreach ($query as $query_result ) {  


            // Comprueba si la fecha de expiracion paso
            if ($query_result->expiration_reserve <= $carbon) { 


                /*Actualiza  la activacion de la reserva*/
               // Reserve::where('id_reserve' , $query_result->id_reserve)->update(['activate_reserve' => 0]); 


                 //Se Cambia el estado de la plaza
                Seat::where('id_seat' ,$query_result->id_seat)->update(['state_seat' => 0]);        
            }
            
        }



    }

}
