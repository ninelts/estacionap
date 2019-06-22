<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException; //Metodo para Poder usar la funcion autenticatedException

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
public function render($request, Exception $e) //Funcion para rederigir segun el codigo de exepccion que se presenta
    {
        if($this->isHttpException($e))    // Comprueba si existe una exepcion 
        {
            switch ($e->getStatusCode())  //si existe obitiene el codigo de exepcion
                {
                // no encontrada
                case 404:
                return redirect('roles');
                break;

                // error interno
                case '500':
                return redirect('roles');
                break;

                default:
                    return $this->renderHttpException($e);
                break;
            }
        }
        else
        {
                return parent::render($request, $e);
        }
    }





    protected function unauthenticated($request, AuthenticationException $exception) //Funcion del framework de laravel para redirigiar a paginas cuando el usuario no esta autenticado a una url por defecto
    {
        if($request->ajax())
        {   //No auntenticado
            return response([
                "message" => "Unauthenticated.",
                "data" => [],
            ],401);
        }

        return redirect()->to('/');   
    }
}
