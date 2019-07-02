<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterCarController extends Controller
{
    public function index(Request $Request) {

    	return view ('estacionapp.registro.registro_auto');
    }

     public function create(Request $request)
    {
        $auto = new auto();

        $auto->pat_auto = $request->input('txtPatente');
        $auto->id_marca = $request->input('marca_auto');
        $auto->id_mod   = $request->input('modelo_auto');
        $auto->save();
        return redirect()->back()->with('status' , 'Se ha registrado con exito'); 
    }
}
