<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\phpqrcode\qrlib;
class CrearqrController extends Controller
{



 
$dir = "img/Qr/";  //Directorio o carpera donde va guardado el QR
$x=true; // Sentencia para iniciar el ciclo While
$cont=0; // Contador para generar diferente nombre del QR
if (!file_exists($dir)) {  // Si El direcctorio de Guardado no existe 
	mkdir($dir); //Mkdir crea la carpeta 
}
	while ($x == true) {
			$nombreqr = $dir.$cont.".png";  // nombre del codigo QR
		if (file_exists($nombreqr)) {  // Si el archivo existe 
		 	$cont=$cont+1; 
		 	//echo $nombreqr;  
		 }else{
			$nombreqr = $dir.$cont.".png";  //Nombre del qr
			$tamano = 10; // Tamaño de QR
			$level = 'H'; //Nivel de detalle de Codigo QE
			$framsize = 1; //Tamñano en blanco
			$contenido = "http://www.google.com";  // Contenido Donde se genera el QR 
			QRcode::png($contenido, $nombreqr, $level, $tamano, $framsize);   // Funcion que genera el QR  
			echo '<img src="'.$dir.basename($nombreqr).'" /><hr/>';
			$x=false;	 // Sentencia para salir del while 
		 }
		}

		return view('estacionapp.session.conductor.conductor',compact('nombreqr')); 
    //
}



