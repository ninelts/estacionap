<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reserve;
// use App\Reserve;
use App\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\admin\Response;

class CrudReserveController extends Controller
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
        // $reserves = Reserve::select(['rut','name','last_name','email','phone']);
        $reserves = DB::table('reserve')->get();
        // dd($reserves);
        return view('estacionapp.administrador.listaReservas', ['reserves' => $reserves]);
    }
    // public function getUsers() //**trae las variables a mostrar en reporte */
    // {
    //     $users = Reserve::select(['rut','name','last_name','email','phone']);
    //     return Datatables::of($users)->make(true);
    // }
    public function getUsers(Request $request) //**trae las variables a mostrar en reporte */
    {
        // $users = Reserve::select(['rut','name','last_name','email','phone']);
        // return view('estacionapp.administrador.listaUsuarios', ['users' => $users]);
    }







    
    //**********************************************READ ******************************************************/

    //**********************************************CREATE ******************************************************/
    public function formAgregarUsuario(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('estacionapp.administrador.agregarUsuarios');
    }
    // public function addUsers(Request $request)
    // {
    //     $request->user()->authorizeRoles(['admin']);


    //     $reserve = new Reserve();
    //     $reserve->rut = $request->input('rut');
    //     $reserve->name = $request->input('txtNombre');
    //     $reserve->last_name   = $request->input('txtApellido');
    //     $reserve->password   = $request->input('password');
    //     $reserve->email   = $request->input('email');
    //     $reserve->phone   = $request->input('txtTelefono');
    //     $reserve->born   = $request->input('txtNacimiento');
    //     $reserve->save();
    //     return view('estacionapp.administrador.listaUsuarios');
    //     // $datosUsuario=request()->all();
    //     // $datosUsuario=request()->except('_token','action');
    //     // dd($datosUsuario);
    //     // Reserve::insert($datosUsuario);
    //     // return response()->json($datosUsuario);
    //     // return view('estacionapp.administrador.listaUsuarios');
    // }



    public function editeUser(Request $request){

        $reserve = Reserve::find($request->id);
        dump($reserve);
        $reserve->name = $request->name;
        $reserve->last_name = $request->last_name;
        $reserve->email = $request->email;
        $reserve->phone = $request->phone;
        $reserve->born = $request->born;
        $reserve->rut = $request->rut;
        $reserve->password = Hash::make($request->password);
        $reserve->save();
        // $success_output = '<div class="alert alert-success">Data Updated</div>';
        return response()->json($reserve);

    }

    public function storeUsers(Request $request)
    {
        //$userId = $request->id;
        // dump($request->id);
        // $role = Role::where('name', 'user')->first();
        // $reserve   =   Reserve::updateOrCreate(
        //     ['id' => $request->id],
        //     ['name' => $request->name,
        //      'email' => $request->email,
        //      'rut' => $request->rut,
        //      'last_name' => $request->last_name,
        //      'password' => Hash::make($request->password),
        //      'phone' => $request->phone,
        //      'born' => $request->born
        //      ]);
        // dump($reserve);



        // if($request->get('button_action') == 'insert')
        // {
        //     $student = new Student([
        //         'first_name'    =>  $request->get('first_name'),
        //         'last_name'     =>  $request->get('last_name')
        //     ]);
        //     $student->save();
        //     $success_output = '<div class="alert alert-success">Data Inserted</div>';
        // }

        // if($request->get('button_action') == 'update')
        // {
        //     $student = Student::find($request->get('student_id'));
        //     $student->first_name = $request->get('first_name');
        //     $student->last_name = $request->get('last_name');
        //     $student->save();
        //     $success_output = '<div class="alert alert-success">Data Updated</div>';
        // }






        dump($request->id);
        $role = Role::where('name', 'user')->first();
        $reserve   =   Reserve::updateOrCreate(
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
        dump($reserve);
        $reserve->roles()->attach($role);  //Funcion para Agregar el rol y el id del usuario en la tabla pivote o muchos a muchos


        // $reserve->save();
        // $reserve   =   Reserve::updateOrCreate(['id' => $userId],
        //             ['name' => $request->name,
        //              'email' => $request->email,
        //              'rut' => $request->rut,
        //              'last_name' => $request->last_name,
        //              'password' => $request->password,
        //              'phone' => $request->phone,
        //              'born' => $request->born,
        //              ]);
        dump($reserve);
        
        return response()->json($reserve);
    }
    //**********************************************CREATE ******************************************************/

    //**********************************************EDITAR ******************************************************/
    public function editReserves(Request $request)
    {
        $reserve = Reserve::where('id_reserve',$request->id)->first();
        dump($reserve);
        $output = array(
            'date_reserve'    =>  $reserve->date_reserve,
            'id_tariff'     =>  $reserve->id_tariff,
            'id_reservetype'     =>  $reserve->id_reservetype,
            'id_qrcode'     =>  $reserve->id_qrcode,
            'id_seat'     =>  $reserve->id_seat,
            'id_reservestate'     =>  $reserve->id_reservestate,
            'qr_url'        => $reserve->qr_url,
            'expiration_reserve'        => $reserve->expiration_reserve,
            'activate_reserve'        => $reserve->activate_reserve,
            'id_reserve'        => $reserve->id_reserve,
            'id_user'        => $reserve->id_user
        );
        dump($output);
        return response()->json($output);

        // $id = $request->input('id');
        // $reserve = user::find($id);
        // $output = array(
        //     'first_name'    =>  $reserve->first_name,
        //     'last_name'     =>  $reserve->last_name
        // );
        // echo json_encode($output);

        
        // $where = array('id' => $request);
        // $reserve  = Reserve::where($where)->first();
        // dump($reserve);
        // return response()->json($reserve);
    }
    //**********************************************EDITAR ******************************************************/

    public function deleteUsers(Request $request)
    {
        $delete = Reserve::find($request->id);
        dump($delete);
        // Reserve::find($request->id)->delete();
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
