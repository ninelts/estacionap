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
use App\ReserveState;

class ReservationController extends Controller
{
	public function __construct()
	{
        $this->middleware(['auth','verified']);  //Middleware

    }

    public function create ($expiration , $tiporeserva , $tarifa , $plazadisponible , $activate_reserve  ){

    	// Carbon::now()->addDays(2)->addHour(3)->addMinutes(20); Metodo para agregar dias horas y minutos
		// subMinutes(20) eliminar


    		$plaza = Seat::where('state_seat', 0)->get(); // se consulta las pla	

    		
    		if (!$plaza->isEmpty()) {

      $useronline = Auth::user()->id;
			$dir    = 'img/Qr/'.$useronline.'/'; // Ruta donde se guardara el Qr
      $name   = $useronline.'_'.uniqid().'.png'; //nombre del archivo

			$content = uniqid().uniqid();  		   // Genera Codigo unico
			$db_qr = new qr_code();
			$db_qr->content_qrcode = $content;  //Se Genera insercion a codigo QR
			$db_qr->count_qrcode = 0;
			$db_qr->save(); 
    		// Se llama a todo los atributos de la tabla qr_code Busca el ultimo id del qr_code y trae el id 
			$db_qr_last = qr_code::All()->last()->id_qrcode; 	

			$reserva = new Reserve;
			$reserva->id_tariff = $tarifa;
			$reserva->id_user = $useronline;
			$reserva->id_reservetype = $tiporeserva;
			$reserva->id_seat = $plazadisponible;
			$reserva->date_reserve = Carbon::now();
			$reserva->expiration_reserve = $expiration; //Expiracion de la reserva
			$reserva->activate_reserve = $activate_reserve; //Activacion de la reserva
			$reserva->id_qrcode = $db_qr_last;  //Ultimo Qr registrado
			$reserva->id_reservestate = 2; //Se registra reserva como en espera
			$reserva->qr_url = $dir.$name; //Se guarda la ruta y el nombre del qr 
			$reserva->save();



          /*-------------VALIDACION------------------------------------------------------------------------------*/



       $carbon = Carbon::now();
       /* $query  Valida que la fecha dada en activate_reserve haya sido superada por la fecha actual donde el estado de la reserva sea en espera , y la fecha de expiracion sea mayor a el tiempo actual */
        $query = Reserve::where([
        ['activate_reserve', '<=' , $carbon],
        ['expiration_reserve', '>=' , $carbon],
        ['id_reservestate' , 2]
        ])->get();
        //master

       foreach ($query as $query_result ) {
          if ($query_result->activate_reserve <= $carbon) {

        // Actuliza el estado de la plaza a vacia 
             Seat::where('id_seat' , $query_result->id_seat )
             ->update(['state_seat' => 1]);
        // Actualiza el estado de la reserva a inactiva 
             
             Reserve::where('id_reserve' , $query_result->id_reserve)
             ->update(['id_reservestate' => 1] );
         }
     }

     /* $query2  Valida que la fecha dada en expiration_reserve haya sido superada por la fecha actual donde el estado de la reserva sea activa */
      $query2 = Reserve::where([
        ['expiration_reserve', '<=' , $carbon],
        ['id_reservestate' , 1]
    ])->get();

     foreach ($query2 as $query_result2 ) {

      // Actualiza el estado de la plaza a vacia 
      Seat::where('id_seat' , $query_result2->id_seat )
      ->update(['state_seat' => 0]);
      
            // Actualiza el estado de la reserva a inactiva 
      Reserve::where('id_reserve' , $query_result2->id_reserve)
      ->update(['id_reservestate' => 0]);

  }


  $CreateQr =  new QrController();
  return $CreateQr->create($content  , $dir , $name);




       } else {

           $respuestamala = "Sin Reservas Disponibles ;(";
           return view('estacionapp.session.conductor.express')->with('respuesta', $respuestamala);
       }
   }









}





