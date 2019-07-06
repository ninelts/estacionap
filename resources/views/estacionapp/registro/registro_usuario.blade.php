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

    @csrf
    <h4>Registro Conductor</h4>
    <div class="col s12">
        <div class="row">


            <div class="input-field col s12">

                <input id="rut" type="text" name="rut" class="validate" value="{{old('rut')}}" >
                <label for="rut">Rut</label>
                @if($errors->get('rut'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('rut') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="nombre" type="text" name="txtNombre" class="validate" value="{{old('txtNombre')}}">
                <label for="nombre">Nombre</label>
                @if($errors->get('txtNombre'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('txtNombre') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="input-field col s6">
                <input id="apellido" type="text" name="txtApellido" class="validate" value="{{old('txtApellido')}}">
                <label for="apellido">Apellido</label>
                @if($errors->get('txtApellido'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('txtApellido') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="correo" type="text" name="email" class="validate" value="{{old('email')}}">
                <label for="correo">Correo</label>
                @if($errors->get('email'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('email') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="telefono" type="tel" name="txtTelefono" class="validate" value="{{old('txtTelefono')}}">
                <label for="telefono">Telefono</label>
                @if($errors->get('txtTelefono'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('txtTelefono') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="input-field col s6">
                <input id="fecha_nac" type="date" name="txtNacimiento" class="validate" value="{{old('txtNacimiento')}}">
                <label for="fecha_nac">Fecha Nacimiento</label> 
                @if($errors->get('txtNacimiento'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('txtNacimiento') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="contrasena" type="password" name="password" class="validate">
                <label for="contrasena">Contraseña</label>
                @if($errors->get('password'))
                <div class="card-error red lighten-2">
                    @foreach ($errors->get('password') as $error)
                    <div class="card-content white-text">
                        <p class="error-form-registroUsu">{{ $error }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="input-field col s6">
                <input id="password-confirm" type="password" class="validate" name="password_confirmation" >
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

            </div>

            <div class="input-field col s12 center-align">
                <button class="boton-submit waves-effect waves-light" type="submit" name="action">Guardar
                </div>
            </div>

        </form>
        <script type="text/javascript">

            $(document).ready(function(){
                setInterval(function(){
                    $.ajax({
                      url: "{{route('register')}}",
                      success: function( response ) {

                      }
                  });
                },1000);
            });

        </script>
    </section>
    @endsection
