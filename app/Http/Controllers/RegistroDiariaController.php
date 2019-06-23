<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class diariaController extends Controller
{
    //

        public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    
    public function index()
    {
        $plazas = DB::table('seat')->get();
        $secciones = DB::table('seat_section')->get();
        return view('estacionapp.session.conductor.diaria', ['plazas' => $plazas]);
    }
}