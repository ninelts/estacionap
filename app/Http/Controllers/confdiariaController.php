<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class confdiariaController extends Controller
{
    //

        public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    
    public function index()
    {
        // $plazas = DB::table('seat')->get();
        // $secciones = DB::table('seat_section')->get();
        // return view('estacionapp.session.conductor.confirmarDiaria', ['plazas' => $plazas]);
        // return view('estacionapp.session.conductor.conductor');
    }
    protected function create(Request $request)
    {
        // $reserve = new Reserve;
        // $reserve->create($reserve->all());
        // return redirect('reserve');
        // $var = Reserve::create([    
        //     'date_reserve' => $data['dateFechaReserva'],
        //     'id_tariff' => $data[1],
        //     'id_user' => $data[Auth::user()->id],
        //     'id_reservetype' => $data[2],
        //     'id_seat' =>$data['txtApellido'],
        // ]);
        // dd($var);
        // return $var;
        return view('estacionapp.session.conductor.confdiaria');
    }
}