<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserve;
use App\qr_code;
use Illuminate\Support\Facades\Auth;
class ReadqrController extends Controller
{
    public function read() {

    	$id_user = Auth::user()->id;
    		

    	//qr_code::where()
    	dd( Reserve::where('id_user' , $id_user)->get());


    }
}
