<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class conductorController extends Controller
{
    //

        public function __construct()
    {
        $this->middleware(['auth','verified']);  //Middleware
    }


    
    public function index(Request $request)
    {

    	$request->user()->authorizeRoles(['usu']);   // Se llama a la funcion AuthorizeRoles , quien esta le envia los roles a comparar
        return view('estacionapp.session.conductor.conductor');
    }
}



