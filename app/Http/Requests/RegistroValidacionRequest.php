<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroValidacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */                     
    public function rules()
    {
        return  [
            'rut'           => 'required|unique:USER,id_user|bail|digits:9',
            'txtNombre'     => 'required|alpha|min:3|max:30',
            'txtApellido'   => 'required|alpha|min:4|max:255',
            'txtCorreo'     => 'required|max:255|email',
            'password' => 'required|min:8|confirmed',
            'txtTelefono'   => 'required|digits:9',
            'txtNacimiento' => 'required|date',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            //
        ];
    }


    public function messages()
    {


        return [

            'rut.required'              =>'El campo rut es obligatorio',
            'rut.min'                   =>'El campo rut debe contener 9 caracteres como minimo',
            'rut.unique'                =>'El rut ya se encuentra registrado',
            'rut.digits'                =>'El campo rut debe contener 9 digitos', 
        //
            'txtNombre.alpha'           =>'El campo nombre solo puede contener letras',
            'txtNombre.required'        =>'El campo nombre es obligatorio',
            'txtNombre.min'             =>'El campo nombre debe contener 4 letras como minimo',

            'txtApellido.required'      =>'El campo apellido es obligatorio',
            'txtApellido.alpha'         =>'El campo apellido solo puede contener letras',
            'txtApellido.min'           =>'El campo apellido debe contener 4 letras como minimo',

            'txtTelefono.required'      =>'El campo telefono es obligatorio',
            'txtTelefono.digits'        =>'El campo telefono debe contener 9 digitos',
            'txtTelefono.integer'       =>'Este campo solo acepta digitos',

            'txtContrasena.required'    =>'El campo contraseña es obligatorio',
            'txtContrasena.min'         =>'El campo contraseña debe contener 8 caracteres como minimo',
            'txtCorreo.required'        =>'El campo correo es obligatorio',   

            'txtNacimiento.required'    =>'El campo fecha es obligatorio'
        ];
    } 


}

