<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Reserve;
use App\Seat;
use App\User;
use App\Tariff;
use App\ReserveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroExpressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $plazadisponible = Seat::where('state_seat', 0)->get();
        if (!$plazadisponible->isEmpty()) {
            $plazadisponible = Seat::where('state_seat', 0)->first()->id_seat;
            $useronline = Auth::user()->id;
            $tarifa = Tariff::where('id_tariff', 1)->first()->id_tariff;
            $tiporeserva = ReserveType::where('id_reservetype', 1)->first()->id_reservetype;
            $reserva = new Reserve;
            $reserva->id_tariff = $tarifa;
            $reserva->id_user = $useronline;
            $reserva->id_reservetype = $tiporeserva;
            $reserva->id_seat = $plazadisponible;
            $reserva->save();
            $plazaestado = Seat::where('state_seat', 0)->first()->state_seat;
            $plazaocupada = Seat::where('id_seat', $plazadisponible)->update(['state_seat' => 1]);
            return view('estacionapp.session.conductor.express')->with('respuesta', $plazadisponible);
        } else {
            $respuestamala = "sin espacio ;(";
            return view('estacionapp.session.conductor.express')->with('respuesta', $respuestamala);
        }
    }
}
