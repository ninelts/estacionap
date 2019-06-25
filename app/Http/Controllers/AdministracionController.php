<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use PDF;

// use Datatables;

class AdministracionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);  //Middleware
    }

    public function index(Request $request) //**verifica el rol para mostrar la vista de administrador */
    {
        $request->user()->authorizeRoles(['admin']);
        return view('estacionapp.administrador.administrador');
    }
    public function getUsers() //**trae las variables a mostrar en reporte */
    {
        $users = User::select(['rut','name','last_name','email','phone']);
        return Datatables::of($users)->make(true);
    }
    public function pdfUsers()
    {
        $pdf = PDF::loadView('estacionapp.administrador.administrador');
        return $pdf->stream();
    }
}
