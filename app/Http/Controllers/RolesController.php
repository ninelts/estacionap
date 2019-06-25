<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $rol = Auth::user()->roles['0']->name;  // Llamo al Array Roles que tiene la tabla pivote segun el usuario
        //Recorre el array Para obtener el tipo de rol que tiene el usuario
    

        switch ($rol) {  //Muestro menu segun el rol del usuario
                case 'user':
                    return redirect()->route('conductor');
                    break;
                    
                case 'admin':
                    return redirect()->route('administracion');
                    break;

                case 'recep':
                    return redirect()->route('recepcion');
                    break;

            }
    }
}
