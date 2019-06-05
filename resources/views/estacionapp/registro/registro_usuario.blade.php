@include('layouts.head')
<nav>
    <a href="#" class="brand-logo">Smart-Parking</a>
    <a href="{{route('inicio')}}" class="back-page left"><i class="fas fa-arrow-left"></i></a>
</nav>
<section class="container section animated fadeIn slower">


  @if(session('status'))
  <div class="center"> 
   <h1 style="color: green"> {{session('status')}}</h1>
</div>

@endif
<form action="{{route('register')}}" method="POST">

    @csrf
    <h4>Registro Conductor</h4>
    <div class="col s12">
        <div class="row">


            <div class="input-field col s12">

                <input id="rut" type="text" name="rut" class="validate" value="{{old('rut')}}" >
                <label for="rut">Rut</label>
                @foreach ($errors->get('rut') as $error)
                <li style='color: red'>{{ $error }}</li>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="nombre" type="text" name="txtNombre" class="validate" value="{{old('txtNombre')}}">
                <label for="nombre">Nombre</label>
                @foreach ($errors->get('txtNombre') as $error)
                <li style='color: red'>{{ $error }}</li>
                @endforeach
            </div>
            <div class="input-field col s6">
                <input id="apellido" type="text" name="txtApellido" class="validate" value="{{old('txtApellido')}}">
                <label for="apellido">Apellido</label>
                @foreach ($errors->get('txtApellido') as $error)
                <li style='color: red' >{{ $error }}</li>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="correo" type="text" name="email" class="validate" value="{{old('email')}}">
                <label for="correo">Correo</label>
                @foreach ($errors->get('email') as $error)
                <li style='color: red' >{{ $error }}</li>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="telefono" type="tel" name="txtTelefono" class="validate" value="{{old('txtTelefono')}}">
                <label for="telefono">Telefono</label>
                @foreach ($errors->get('txtTelefono') as $error)
                <li style='color: red' >{{ $error }}</li>
                @endforeach
            </div>
            <div class="input-field col s6">
                <input id="fecha_nac" type="date" name="txtNacimiento" class="validate" value="{{old('txtNacimiento')}}">
                <label for="fecha_nac">Fecha Nacimiento</label> 
                @foreach ($errors->get('txtNacimiento') as $error)
                <li style='color: red' >{{ $error }}</li>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="contrasena" type="password" name="password" class="validate">
                <label for="contrasena">Contraseña</label>
                @foreach ($errors->get('password') as $error)
                <li style='color: red' >{{ $error }}</li>
                @endforeach
            </div>
            <div class="input-field col s6">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                </div>

            </div>
            <div class="input-field col s12">
                <input class="boton btn-registro" type="submit" value="Guardar">
            </div>
        </div>

    </form>
</section>
@include('layouts.footer')