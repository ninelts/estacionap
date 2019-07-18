<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reserve;
use Illuminate\Support\Facades\Auth;
use App\User;

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
		$id_user = Auth::user()->id; // Capturamos el id del usuario

        // Capaturamos el id para consultar todas las reservas del usuario donde las reservas sean activas o en espera --- WHEREBEETEWN -- usuamos el with para llamar a todos los datos de las tablas relacionadas
		$reserves = Reserve::where('id_user' , $id_user)->whereBetween('id_reservestate', ['1' ,'2'])->with('tariffs')->with('users')->with('reservestate')->get();

		return view('estacionapp.session.conductor.misReservas')->with('reserves' , $reserves);
	}


	public function dateUser(Request $request){
		$request->user()->authorizeRoles(['user']);
		return view('estacionapp.session.conductor.datosUsuario');

	}
}
