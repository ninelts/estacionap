<?php

namespace App\Http\Controllers;
use App\qr_code;
use Illuminate\Http\Request;
use  SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use App\Reserve;
use App\ReserveState;
use redirect;

class QrController extends Controller
{
    //
 public function __construct()
 {
        $this->middleware(['auth','verified']);  //Middleware
    }

    public function create($content , $dir , $name){


        dump($dir);
        $size   = 250; //Tamanio Qr en pixeles
        $merge  = '/public/img/parking.png'; 
        $cont   = $content; //contenido del Qr
        


        if (!file_exists($dir)){  // Si El direcctorio de Guardado no existe 
        mkdir($dir , 0777 , true); //Mkdir crea la carpeta 
    }


        $QR=QrCode::format('png')       // Sintaxis para generar QR
        ->size($size)                   // tamaño en px
        ->merge($merge)                 // Se incrusta una imagen al QR
        ->errorCorrection('H')          //Nivel de detalle de Codigo QR
        ->generate($cont , $dir.$name); //Contenido luego Se concatena el nombre de la ruta + el nombre del qr
        return redirect('/misreservas')->with('QR',$dir.$name);
    }


    public function read (Request $request){
        if($request->ajax()) {
        //Traemos todas las peticiones enviadas por post
            $read = $request->all(); 
        //Capturamos el contenido del QR 
            $qr_content = $read['qr'];
            //Consultamos las reservas segun el contenido del QR y Capturaos su id 
            $id_qr = qr_code::all()->where('content_qrcode' , $qr_content)->first()->id_qrcode;

           $id_reservestate = Reserve::all()->where('id_qrcode' , $id_qr)->first()->id_reservestate;

          $state_reserve = ReserveState::all()->where('id_reservestate' ,$id_reservestate)->first()->name_reservestate;


        return response()->json(['message' => 'Su Reserva esta :  '.$state_reserve  ]);
    }else{
        return redirect::route('/');
    }


}
}
