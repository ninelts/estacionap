<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\qr_code;
use App\Seat;
use App\Tariff;
use Illuminate\Support\Facades\Auth;
class ReadqrController extends Controller
{
    public function read() {

    	$id_user = Auth::user()->id;
    		

    	//qr_code::where()
    	$reserve_id = Reserve::where('id_user' , $id_user)->get();
		
		foreach ($reserve_id as $reserve ) {
				

				$id_seat 			= $reserve->id_seat;
				$id_tariff			= $reserve->id_tariff;
				$date_reserve 		= $reserve->date_reserve;
				$id_qrcode 			= $reserve->id_qrcode;
				$expiration_reserve	= $reserve->expiration_reserve;
				$activate_reserve	= $reserve->activate_reserve;

			 $tariff =Tariff::where('id_tariff' , $id_tariff )->first();
			 $tariff_name = $tariff->name_tariff;
			 

		}


    }
}
