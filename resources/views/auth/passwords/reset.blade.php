@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
                
                <h1>{{ __('Reset Password') }}</h1>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="correo" type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}">
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

                        <!--<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                        <div class="row">
                        <div class="input-field col s6">
                            <input id="contrasena" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
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
                        <!--<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>-->
                    </form>
    </div>
</div>
@endsection
