<?php

namespace App\Http\Controllers\guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    
	public function start(){

		return view('estacionapp.inicio');
	}

	public function login(){

		return view('estacionapp.login');
	}


}
