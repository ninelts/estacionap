<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class conductorController extends Controller
{
    //

    public function index(Request $request)
    {


    	$request->user()->authorizeRoles(['user']);   // Se llama a la funcion AuthorizeRoles , quien esta le envia los roles a comparar
        return view('estacionapp.session.conductor.conductor');
    }

}



