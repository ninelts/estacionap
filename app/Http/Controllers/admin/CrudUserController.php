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
    // public function addUsers(Request $request)
    // {
    //     $request->user()->authorizeRoles(['admin']);


    //     $user = new User();
    //     $user->rut = $request->input('rut');
    //     $user->name = $request->input('txtNombre');
    //     $user->last_name   = $request->input('txtApellido');
    //     $user->password   = $request->input('password');
    //     $user->email   = $request->input('email');
    //     $user->phone   = $request->input('txtTelefono');
    //     $user->born   = $request->input('txtNacimiento');
    //     $user->save();
    //     return view('estacionapp.administrador.listaUsuarios');
    //     // $datosUsuario=request()->all();
    //     // $datosUsuario=request()->except('_token','action');
    //     // dd($datosUsuario);
    //     // User::insert($datosUsuario);
    //     // return response()->json($datosUsuario);
    //     // return view('estacionapp.administrador.listaUsuarios');
    // }



    public function editeUser(Request $request){

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
        // $success_output = '<div class="alert alert-success">Data Updated</div>';
        return response()->json($user);

    }

    public function storeUsers(Request $request)
    {
        //$userId = $request->id;
        // dump($request->id);
        // $role = Role::where('name', 'user')->first();
        // $user   =   User::updateOrCreate(
        //     ['id' => $request->id],
        //     ['name' => $request->name,
        //      'email' => $request->email,
        //      'rut' => $request->rut,
        //      'last_name' => $request->last_name,
        //      'password' => Hash::make($request->password),
        //      'phone' => $request->phone,
        //      'born' => $request->born
        //      ]);
        // dump($user);



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


        // $user->save();
        // $user   =   User::updateOrCreate(['id' => $userId],
        //             ['name' => $request->name,
        //              'email' => $request->email,
        //              'rut' => $request->rut,
        //              'last_name' => $request->last_name,
        //              'password' => $request->password,
        //              'phone' => $request->phone,
        //              'born' => $request->born,
        //              ]);
        dump($user);
        
        return response()->json($user);
    }
    //**********************************************CREATE ******************************************************/

    //**********************************************EDITAR ******************************************************/
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

        // $id = $request->input('id');
        // $user = user::find($id);
        // $output = array(
        //     'first_name'    =>  $user->first_name,
        //     'last_name'     =>  $user->last_name
        // );
        // echo json_encode($output);

        
        // $where = array('id' => $request);
        // $user  = User::where($where)->first();
        // dump($user);
        // return response()->json($user);
    }
    //**********************************************EDITAR ******************************************************/

    public function deleteUsers(Request $request)
    {
        $delete = User::find($request->id);
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
