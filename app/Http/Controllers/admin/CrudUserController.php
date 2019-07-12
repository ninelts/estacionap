<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CrudUserController extends Controller
{
    public function __construct()
    {
        //Middleware
        $this->middleware(['auth','verified']);
    }

    //**********************************************READ ******************************************************/
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        // return view('estacionapp.administrador.listaUsuarios');
        // $users = User::select(['rut','name','last_name','email','phone']);
        $users = DB::table('users')->get();
        // dd($users);
        return view('estacionapp.administrador.listaUsuarios', ['users' => $users]);
    }
    // public function getUsers() //**trae las variables a mostrar en reporte */
    // {
    //     $users = User::select(['rut','name','last_name','email','phone']);
    //     return Datatables::of($users)->make(true);
    // }
    public function getUsers(Request $request) //**trae las variables a mostrar en reporte */
    {
        // $users = User::select(['rut','name','last_name','email','phone']);
        // return view('estacionapp.administrador.listaUsuarios', ['users' => $users]);
    }







    
    //**********************************************READ ******************************************************/

    //**********************************************CREATE ******************************************************/
    public function formAgregarUsuario(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('estacionapp.administrador.agregarUsuarios');
    }
    public function addUsers(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);


        $user = new User();
        $user->rut = $request->input('rut');
        $user->name = $request->input('txtNombre');
        $user->last_name   = $request->input('txtApellido');
        $user->password   = $request->input('password');
        $user->email   = $request->input('email');
        $user->phone   = $request->input('txtTelefono');
        $user->born   = $request->input('txtNacimiento');
        $user->save();
        return view('estacionapp.administrador.listaUsuarios');
        // $datosUsuario=request()->all();
        // $datosUsuario=request()->except('_token','action');
        // dd($datosUsuario);
        // User::insert($datosUsuario);
        // return response()->json($datosUsuario);
        // return view('estacionapp.administrador.listaUsuarios');
    }
    //**********************************************CREATE ******************************************************/

    

    public function deleteUsers(Request $request)
    {
        // User::find($request->id)->delete();
        return response()->json();
    }

    public function pdfUsers()
    {
        $users = DB::table('users')->get();
        $pdf = PDF::loadView('estacionapp.administrador.reporteUsuarios', ['users' => $users]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream();
    }
    public function xlsxExport()
    {
        return Excel::download(new UsersExport, 'ususarios_estacionapp.xlsx');
    }
}
