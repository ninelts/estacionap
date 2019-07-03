<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
        public function __construct()
    {	
        $this->middleware(['auth','verified']);  //Middleware
    }


	public function reservation(Request $request) {
		$request->user()->authorizeRoles(['user']);
		return view('estacionapp.session.conductor.generarReserva');
	}

	Public function myReservation(Request $request) {
		$request->user()->authorizeRoles(['user']);
		return view('estacionapp.session.conductor.misReservas');
	}


	public function dateUser(Request $request){
		$request->user()->authorizeRoles(['user']);
		return view('estacionapp.session.conductor.datosUsuario');

	}


}
