@extends('layouts.layout')
<!-- <nav>
    <a href="#" class="brand-logo">Smart-Parking</a>
    <a href="{{route('inicio')}}" class="back-page left"><i class="fas fa-arrow-left"></i></a>
</nav> -->
@section('content')
<section class="container section animated fadeIn slower">

    @if(session('status'))
    <div class="card-success green lighten-2">
        <div class="card-content">
           <h4 class="success-form-registroUsu white-text">{{session('status')}}</h4>
       </div>
   </div>
   @endif



<form class="formulario" action="{{route('register')}}" method="POST">

   <form action="{{route('register')}}" method="POST">


    @csrf
    <h4>Registro Conductor</h4>
    <div class="col s12">
        <div class="row">
            @if($errors->get('rut'))
            <div class="card-error red lighten-2">
                @foreach ($errors->get('rut') as $error)
                <div class="card-content white-text">
                    <p class="error-form-registroUsu">{{ $error }}</p>
                </div>
                @endforeach
            </div>
            @endif

            @if($errors->get('email'))
            <div class="card-error red lighten-2">
                @foreach ($errors->get('email') as $error)
                <div class="card-content white-text">
                    <p class="error-form-registroUsu">{{ $error }}</p>
                </div>
                @endforeach
            </div>
            @endif

            <div class="input-field col s12">

                <input id="rut" type="text" name="rut" class="validate" value="{{old('rut')}}" >
                <label for="rut">Rut</label>
                <div id="rutv" class=""></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="nombre" type="text"  name="txtNombre" class="validate" value="{{old('txtNombre')}}">
                <label for="nombre">Nombre</label>
                <div id="nombrev" class=""></div>
            </div>
            <div class="input-field col s6">
                <input id="apellido" type="text" name="txtApellido" class="validate" value="{{old('txtApellido')}}">
                <label for="apellido">Apellido</label>
                <div id="apellidov" class=""></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="correo" type="text" name="email" class="validate" value="{{old('email')}}">
                <label for="correo">Correo</label>
                <div id="correov" class=""></div>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="telefono" type="tel" name="txtTelefono" class="validate" value="{{old('txtTelefono')}}">
                <label for="telefono">Telefono</label>
                <div id="telefonov" class=""></div>

            </div>
            <div class="input-field col s6">
                <input id="fecha_nac" type="date" name="txtNacimiento" class="validate" value="{{old('txtNacimiento')}}">
                <label for="fecha_nac">Fecha Nacimiento</label> 
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="contrasena" type="password" name="password" class="validate">
                <label for="contrasena">Contraseña</label>
                <div id="contrasenav" class="" ></div>
            </div>
            <div class="input-field col s6">
                <input id="password-confirm"  type="password" class="validate" name="password_confirmation" >
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div id="contrasenav2" class="" ></div>
            </div>

            <div class="input-field col s12 center-align">
                <button id="Guardar" class="boton-submit waves-effect waves-light" type="submit" name="action">Guardar
                </div>
            </div>

        </form>
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'>
        </script>
        <script type="text/javascript">

           $(document).ready(function () {
            $("#rut").keyup(rutv);
        });

           $(document).ready(function () {
            $("#nombre").keyup(nombrev);
        });

           $(document).ready(function (){
            $("#apellido").keyup(apellidov);
        });

           $(document).ready(function (){
            $("#correo").keyup(correov);
        });

           $(document).ready(function (){
            $("#telefono").keyup(telefonov);
        });


           $(document).ready(function (){
            $("#contrasena").keyup(contrasenav);
        });
           $(document).ready(function (){
            $("#password-confirm").keyup(contrasenav2);
        });

           function rutv(){
            var rut = document.getElementById("rut").value;
            var rut_tamanio = rut.length;
            var expression = /(^([0-9])*$)/;
            var regex = RegExp(expression);
            var result = regex.test(rut);
            if(result == false){
                document.getElementById("rutv").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo rut debe contener solo numeros </p></div></div>";

            }else{

                if(rut_tamanio<9 || rut_tamanio>=10){

                    document.getElementById("rutv").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo rut debe contener 9 caracteres </p></div></div>";
                }else{
                    document.getElementById("rutv").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Campo rut correcto</p></div></div>";

                }
            }

        }

        function nombrev() {
            var nombre = document.getElementById('nombre').value;
            var nombre_tamanio = nombre.length; 
            if (nombre_tamanio<3)
            {
                document.getElementById("nombrev").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo nombre debe contener 3 letras como minimo</p></div></div>";



            }else{
                var expression = /^[a-zA-Z]*$/;
                var regex = new  RegExp(expression);
                var result = expression.test(nombre);
                if(result == false){
                 document.getElementById("nombrev").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo solo acepta caracteres </p></div></div>";     


             }else{
                if(nombre_tamanio>16){
                   document.getElementById("nombrev").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo solo acepta hasta 16 letras </p></div></div>";     


               }else{
                   document.getElementById("nombrev").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>campo nombre correcto</p></div></div>";

               }
           }
       } 
   }

   function apellidov(){
    var apellido = document.getElementById("apellido").value;
    var apellido_tamanio = apellido.length; 
    if(apellido_tamanio<4) {
        document.getElementById("apellidov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'> El campo apellido debe contener 4 letras como minimo </p></div></div>";

    }else{

        var expression = /^[a-zA-Z]*$/;
        var regex = new  RegExp(expression);
        var result = expression.test(apellido);
        if(result == false){
          document.getElementById("apellidov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'> El campo apellido solo acepta letras</p></div></div>";


      }else{

        if(apellido_tamanio>16){

            document.getElementById("apellidov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'> El campo apellido solo acepta hasta 16 letras</p></div></div>";
        }else{
            document.getElementById("apellidov").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Campo apellido correcto</p></div></div>";
        }
    }
}
}

function correov(){
    var correo = document.getElementById("correo").value;
    var expression = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var regex = new RegExp(expression);
    var result = regex.test(correo);
    if(result ==false ){
     document.getElementById("correov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>El campo correo es invalido</p></div></div>";


 }else{
    document.getElementById("correov").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Campo correo correcto</p></div></div>";

}
}

function telefonov(){
    var telefono = document.getElementById("telefono").value;
    var telefono_tamanio = telefono.length;
    var expression = /^([0-9])*$/;
    var regex = RegExp(expression);
    var result = regex.test(telefono);
    if(result == false){

     document.getElementById("telefonov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'> El campo telefono debe contener solo numeros </p></div></div>";


 }else{
    if( telefono_tamanio>=10 || telefono_tamanio<9  ){

        document.getElementById("telefonov").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'> El campo telefono debe contener 9 numeros </p></div></div>";
    }else{

        document.getElementById("telefonov").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Campo telefono correcto </p></div></div>";
    }
}
}

function contrasenav(){
    var contrasena = document.getElementById("contrasena").value;
    var expression = /^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/
    var regex = new RegExp(expression);
    var result = regex.test(contrasena);
    var contrasena_tamanio = contrasena.length;
    if(result == false || contrasena_tamanio<6 || contrasena_tamanio>=13 ){


        document.getElementById("contrasenav").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Debe contener 1 mayuscula ,1 numero , 1 simbolo , y  minimo 6 caracteres maximo 12</p></div></div>";
    }else {

     document.getElementById("contrasenav").innerHTML=" <div></div>";
 }
}

function contrasenav2(){
    var contrasena = document.getElementById("contrasena").value;
    var contrasena_tamanio = contrasena.length;
    var contrasena2 = document.getElementById("password-confirm").value;
    if(contrasena_tamanio == 0){


    }else{
        //
    if( contrasena != contrasena2 ){
     document.getElementById("contrasenav").innerHTML=" <div class='card-error red lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Contraseñas diferentes </p></div></div>";
 }else {
    document.getElementById("contrasenav").innerHTML=" <div class='card-error green lighten-2'> <div class='card-content white-text'><p class='error-form-registroUsu'>Campos contraseñas correctos </p></div></div>";
}
}

    }


</script>
</section>
@endsection
