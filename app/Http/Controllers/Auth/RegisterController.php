<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
       public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));   //metodo para registrar Usuario se crea el evente registrar usuario

        return redirect()->route('registro')->with('status','Se ha registrado Exitosamente');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {$messages = array(
        'rut.required'              =>'El campo rut es obligatorio',
        'rut.min'                   =>'El campo rut debe contener 9 caracteres como minimo',
        'rut.unique'                =>'El rut ya se encuentra registrado',
        'rut.digits'                =>'El campo rut debe contener 9 digitos', 
        
        'txtNombre.alpha'           =>'El campo nombre solo puede contener letras',
        'txtNombre.required'        =>'El campo nombre es obligatorio',
        'txtNombre.min'             =>'El campo nombre debe contener 4 letras como minimo',

        'txtApellido.required'      =>'El campo apellido es obligatorio',
        'txtApellido.alpha'         =>'El campo apellido solo puede contener letras',
        'txtApellido.min'           =>'El campo apellido debe contener 4 letras como minimo',

        'email.required' => 'El campo correo es obligatorio',
        'email.email' => 'El campo correo debe ser una dirección de correo válida.',

        'txtTelefono.required'      =>'El campo telefono es obligatorio',
        'txtTelefono.digits'        =>'El campo telefono debe contener 9 digitos',
        'txtTelefono.integer'       =>'Este campo solo acepta digitos',

        'password.required'    =>'El campo contraseña es obligatorio',
        'password.min'         =>'El campo contraseña debe contener 8 caracteres como minimo',
        'password.required'        =>'El campo contraseña es obligatorio',
        'password.confirmed' => 'El campo confirmación de contraseña no coincide',

        'txtNacimiento.required'    =>'El campo fecha es obligatorio'
    ); 

    return Validator::make($data, [
        'rut' => ['required', 'string', 'min:8','unique:users'],
        'txtNombre' => ['required', 'string', 'max:255'],
        'txtApellido' => ['required', 'string', 'min:4'],
        'txtTelefono' => ['required', 'numeric', 'min:8'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'txtNacimiento' => ['required'],
        'password' => ['required', 'string', 'min:8','confirmed'],
    ], $messages);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data )
    {
        return User::create([
            'name' => $data['txtNombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rut' => $data['rut'],
            'last_name' =>$data['txtApellido'],
            'phone' => $data['txtTelefono'],
            'born' => $data['txtNacimiento'],

        ]);
    }

}
