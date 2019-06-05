<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class conductorController extends Controller
{
    //

        public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    
    public function index()
    {
        return view('estacionapp.session.conductor.conductor');
    }
}



