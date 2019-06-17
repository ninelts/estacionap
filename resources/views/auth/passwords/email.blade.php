@extends('layouts.layout')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
             {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('password.email') }}" >
            <h1>Olvido su contraseña</h1>
            @csrf
            <div class="row">
                <div class="col s12">
                    <div class="card yellow lighten-4">
                        <div class="card-content blue-grey-text darken-2-text">
                            <p>Ingrese su correo y se enviara un email para que pueda reestablecer su contraseña</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix blue-grey-text darken-2-text">email</i>
                    <input id="email" type="email" name="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                    <label for="email">Correo</label>
                    @if($errors->has('email'))
                    <div class="card-error red lighten-2">
                        <div class="card-content white-text">
                            <p class="error-form-registroUsu invalid-feedback">{{ $errors->first('email') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">

                <div class="input-field col s12 center-align">
                    <button class="boton-submit waves-effect waves-light" type="submit" name="action">Enviar Correo
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
