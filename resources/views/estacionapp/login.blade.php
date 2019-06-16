@include('layouts.head')
@include('layouts.header')
<div class="container">
    <div class="row">
        <form class="col s12" action="{{route('login')}}" method="POST">
        @csrf
            <h1>Iniciar Sesion</h1>
            @if(session('status'))
            <div class="mensaje-error">
                <p class="center">{{session('status')}}</p>
            </div>
            @endif
            <div class="row">

                <div class="input-field col s12">
                    <i class="material-icons prefix blue-grey-text darken-2-text">account_circle</i>
                    <input id="username" name="rut" type="text" class="">
                    <label for="username">Rut Usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix blue-grey-text darken-2-text">lock</i>
                    <input id="password" name="password" type="password" class="">
                    <label for="password">Contraseña</label>
                </div>
                <label class="col s12 center-align">
                    <input type="checkbox" id="check" />
                    <span>Recordarme</span>
                </label>
                <div class="input-field col s12 center-align">
                    <button class="boton-submit waves-effect waves-light" type="submit" name="action">Iniciar Sesion
                </div>
                <label class="nuevo-registro col s12 center-align">
                    <p>¿Nuevo en la App?</p>
                    <a href="{{route('registro')}}" class="link">Registrate</a>
                </label>
                <label class="nuevo-registro col s12 center-align">
                    <a href="{{ route('password.request') }}" class="link">¿Olvido su Contraseña?</a>
                </label>

            </div>
        </form>
    </div>
</div>
@include('layouts.footer')