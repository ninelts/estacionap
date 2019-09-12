<?php

namespace App\Http\Controllers\reserves;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seat;
use App\Tariff;
use App\ReserveType;
use Carbon\Carbon;
use DateTime;
use App\Reserve;
use App\Http\Controllers\ReservationController;

class DayliController extends Controller
{

    public function index (Request $request){

       $request->user()->authorizeRoles(['user']);
       $plaza = Seat::all();
       return view('estacionapp.session.conductor.diaria')->with('plazas' , $plaza);

   }

   public function create (Request $request){

    //Reserva Diaria

     foreach ($request->input('dateFechaReserva') as $array ) {

        $fecha1 = $array;   /* Traemos la Fecha obtenida en el array*/
    }

    foreach ($request->input('plaza') as $array2 ) {

              $id_seat = $array2; // Traemos la plaza obtenida
          }

        $DateTime = new DateTime($fecha1); // Se Setea fecha a DateTime
        $date = Carbon::instance($DateTime)->addHours(23)->addMinutes(59)->addSeconds(59); 

        //Verifica que la fecha actual no sea menor 
        if ($date >= Carbon::now()) {
        $activate_reserve = $DateTime;   //  Capturamos Fecha de Reserva
        $expiration =  Carbon::instance($DateTime)->addHours(21);//Tiempo limite de la expiracion 9:00 pm ;
        $tarifa = Tariff::where('id_tariff', 2)->first()->id_tariff;   // Tipo de Tarifa
        $tiporeserva = ReserveType::where('id_reservetype', 2)->first()->id_reservetype; 
        $plazadisponible = Seat::where('id_seat', $id_seat )->first()->id_seat;
        $id_reservetype = 2;



        /*VALIDACION SI EXISTE UNA RESERVA DIARIA EN LA PLAZA Y LA FECHA SELECCIONADA*/
        $reserve = new ReservationController();

        //Se consulta en la db si la fecha introducida en el form existe en la db , como el id_reserva , y si el tipo se plaza es igual
        $query = Reserve::where([
         ['activate_reserve' , $activate_reserve],
         ['id_reservetype', $id_reservetype],
         ['id_seat' , $plazadisponible], 
        ])->get();  

        //Query si no esta vacia entra al if
        if(!$query->isEmpty()){
            return redirect()->back()->with('status','Plaza Nro° :'.$plazadisponible.' '.'Ya reservada para la Fecha :'.date_format($activate_reserve, 'd-m-Y'));
        } 

        return $reserve->create($expiration , $tiporeserva , $tarifa ,$plazadisponible , $activate_reserve , $id_reservetype );
    }else {
        return redirect()->back()->with('status', 'La Fecha ingresada es incorrecta');
    }
  }
}
