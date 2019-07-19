<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\admin\Response;

class CrudUserController extends Controller
{
    public function __construct()
    {
        //Middleware
        $this->middleware(['auth','verified']);
    }

    /* READ USUARIOS ACTIVOS*/
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $users = DB::table('users')->where('id_stateuser', 0)->get();
        return view('estacionapp.administrador.listaUsuarios', ['users' => $users]);
    }

    /* READ USUARIOS INACTIVOS*/
    public function indexDesactivados(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $users = DB::table('users')->where('id_stateuser', 1)->get();
        return view('estacionapp.administrador.listaUsuarios', ['users' => $users]);
    }

    /* UPDATE USUARIOS*/
    public function editeUser(Request $request)
    {
        $user = User::find($request->id);
        dump($user);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->born = $request->born;
        $user->rut = $request->rut;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json($user);
    }

    /*GUARDA USUARIO NUEVO O MODIFICACIÓN*/
    public function storeUsers(Request $request)
    {
        $role = Role::where('name', 'user')->first();
        $user   =   User::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name,
             'email' => $request->email,
                     'rut' => $request->rut,
                     'last_name' => $request->last_name,
                     'password' => Hash::make($request->password),
                     'phone' => $request->phone,
                     'born' => $request->born
                     ]
        );
        dump($user);
        $user->roles()->attach($role);  //Funcion para Agregar el rol y el id del usuario en la tabla pivote o muchos a muchos
        dump($user);
        return response()->json($user);
    }

    /* CARGA DATOS USUARIOS PARA UPDATE */
    public function editUsers(Request $request)
    {
        $user = User::find($request->id);
        $output = array(
            'rut'    =>  $user->rut,
            'name'     =>  $user->name,
            'last_name'     =>  $user->last_name,
            'phone'     =>  $user->phone,
            'born'     =>  $user->born,
            'email'     =>  $user->email,
            'id'        => $user->id
        );
        dump($output);
        return response()->json($output);
    }

    public function deleteUsers(Request $request)
    {
        $disable = User::find($request->id);
        // $rol = DB::table('role_user')->where('user_id', $disable->id)->get('id');
        // $rol_user = $rol->id;
        // $request->get('your_id');
        // dump($rol);
        $disable->id_stateuser = 1;
        $disable->save();
        DB::table('role_user')->where('user_id', $request->id)->delete();
        dump($disable);
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
