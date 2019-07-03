<?php

namespace App\Http\Controllers;
use App\qr_code;
use Illuminate\Http\Request;
use  SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class QrController extends Controller
{
    //
       public function __construct()
    {
        $this->middleware(['auth','verified']);  //Middleware
    }

	public function create($content){

		$dir    = 'img/Qr/'.Auth::user()->rut.'/'; // Ruta donde se guardara el Qr
        $rut    = Auth::user()->rut; //Rut de la session
        $name   = $rut.'_'.uniqid().'.png'; //nombre del archivo
        $size   = 250; //Tamanio Qr en pixeles
        $merge  = '/public/img/parking.png'; 
        $cont   = $content; //contenido del Qr
        


        if (!file_exists($dir)) {  // Si El direcctorio de Guardado no existe 
        mkdir($dir); //Mkdir crea la carpeta 
        }


        $QR=QrCode::format('png')       // Sintaxis para generar QR
        ->size($size)                   // tamaño en px
        ->merge($merge)                 // Se incrusta una imagen al QR
        ->errorCorrection('H')          //Nivel de detalle de Codigo QR
        ->generate($cont , $dir.$name); //Contenido luego Se concatena el nombre de la ruta + el nombre del qr
        
        return redirect('/misreservas')->with('QR',$dir.$name);
	}


}
