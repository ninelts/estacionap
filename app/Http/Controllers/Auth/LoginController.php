<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;


    public $maxAttempts = 3;   // Maximo de intentos
    public $decayMinutes = 10;  // Bloqueo en minutos   

    public function username()

    {
        return 'rut'; 
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/roles';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function sendFailedLoginResponse(Request $request) //Funcion intentos Fallidos
    {   


        $attempts = session()->get('login.attempts', 1); // obtener intentos, default: 0
        if ($attempts<=2) {
        session()->put('login.attempts', $attempts + 1); // incrementrar intentos
        return Redirect::back()->with('status','Usuario o contraseña Incorrecta')->with('status2','
            Intentos :' .$attempts);

    }else{


       return Redirect::back()->with('status','Su Cuenta se ha bloqueado temporalmente')->with('status',$this->decayMinutes.':Minutos');


   }
}





protected function authenticated(Request $request)
{
        session()->forget('login.attempts');    //Invacamos a la funcion aunteticado una ves antenticado se manda a olvidar el numero de intentos para la session //
    }

    protected function logout(Request $request){
        Auth::logout();
        return Redirect::route('inicio');
    }
}



