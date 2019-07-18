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

class CrudTariffController extends Controller
{
    public function __construct()
    {
        //Middleware
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request) 
    {
        $request->user()->authorizeRoles(['admin']); //**verifica el rol para mostrar la vista de administrador */
        return view('estacionapp.administrador.administrador');
    }
    public function showUsers(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('estacionapp.administrador.listaUsuarios');
    }
    public function formAgregarUsuario(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('estacionapp.administrador.agregarUsuarios');
    }
    public function addUsers(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $datosUsuario=request()->all();
        // dd($datosUsuario);
        return response()->json($datosUsuario);
        // User::insert($datosUsuario);
        // return view('estacionapp.administrador.listaUsuarios');
    }
    public function getUsers() //**trae las variables a mostrar en reporte */
    {
        $users = User::select(['rut','name','last_name','email','phone']);
        return Datatables::of($users)->make(true);
    }
    public function pdfTariffs()
    {
        $users = DB::table('tariff')->get();
        $pdf = PDF::loadView('estacionapp.administrador.reporteTarifas', ['tariffs' => $tariffs]);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream();
    }
    public function xlsxExport()
    {
        return Excel::download(new TariffsExport, 'tarifas_estacionapp.xlsx');
    }
}
