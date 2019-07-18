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

class AdminController extends Controller
{
    public function __construct()
    {

    public function index(Request $request) //**verifica el rol para mostrar la vista de administrador */
    {
        $request->user()->authorizeRoles(['admin']); //**verifica el rol para mostrar la vista de administrador */
        return view('estacionapp.administrador.administrador');
    }
}
