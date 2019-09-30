<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegistroValidacionRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    public function index () {

        return view('estacionapp.registro.registro_usuario');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data){

        $messages = array(
        'rut.required'              =>'El campo rut es obligatorio',
        'rut.min'                   =>'El campo rut debe contener 9 caracteres como minimo',
        'rut.unique'                =>'El rut ya se encuentra registrado',
        'rut.digits'                =>'El campo rut debe contener 9 digitos', 
        
        'txtNombre.alpha'           =>'El campo nombre solo puede contener letras',
        'txtNombre.required'        =>'El campo nombre es obligatorio',
        'txtNombre.min'             =>'El campo nombre debe contener 3 letras como minimo',

        'txtApellido.required'      =>'El campo apellido es obligatorio',
        'txtApellido.alpha'         =>'El campo apellido solo puede contener letras',
        'txtApellido.min'           =>'El campo apellido debe contener 4 letras como minimo',

        'email.required' => 'El campo correo es obligatorio',
        'email.email' => 'El campo correo debe ser una dirección de correo válida.',

        'txtTelefono.required'      =>'El campo telefono es obligatorio',
        'txtTelefono.numeric'       =>'EL campo telefono solo acepta numeros',
        'txtTelefono.digits_between'=>'El campo telefono debe contener 9 digitos',

        'password.required'         =>'El campo contraseña es obligatorio',
        'password.min'              =>'El campo contraseña debe contener 6 caracteres como minimo',
        'password.regex'            =>'El campo contraseña Debe contener Un Caracter Mayuscula,Numerico,Simbolo,minusculas',
        'password.confirmed'        => 'El campo confirmación de contraseña no coincide',

        'txtNacimiento.required'    =>'El campo fecha es obligatorio'
    ); 

    return Validator::make($data, [
        'rut' => ['required', 'string', 'min:9','unique:users'],
        'txtNombre' => ['required', 'alpha', 'max:16' ,'min:3'],
        'txtApellido' => ['required', 'alpha', 'min:4'],
        'txtTelefono' => ['required', 'numeric', 'digits_between:9,9'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'txtNacimiento' => ['required'],
        'password' => ['required', 
        'min:6', 
        'regex:"^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"', 
        'confirmed']
        ,
    ]/*, $messages*/);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data )
    {
        $role = Role::where('name', 'user')->first();
        $user = User::create([
            'name' => $data['txtNombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rut' => $data['rut'],
            'last_name' =>$data['txtApellido'],
            'phone' => $data['txtTelefono'],
            'born' => $data['txtNacimiento'],

        ]);
        $user->roles()->attach($role);  //Funcion para Agregar el rol y el id del usuario en la tabla pivote o muchos a muchos
         return $user;
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));   //metodo para registrar Usuario se crea el evento registrar usuario
        $this->guard()->login($user); // Se le asigna una session al usuario creado
        return redirect()->route('roles'); // Retorna a la ruta roless
    }

}
