<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionController extends Controller
{
	      public function __construct()
    {
        $this->middleware(['auth','verified']);  //Middleware
    }

    public function index (Request $request) {


    	$request->user()->authorizeRoles(['admin']);
    	return view('estacionapp.session.recepcion.recepcion');

    }
}
