@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Cuenta Usuario</h1>
    <div class="row">
    <div class="col s12 m6">
      <div class="card yellow lighten-4">
        <div class="card-content blue-grey-text darken-2-text">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <span class="card-title">{{ __('Verify Your Email Address') }}</span>
        <p>{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}</p>
        </div>
        <div class="card-action">
          <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
        </div>
      </div>
    </div>
  </div>
<!--         <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div> -->
</div>
@endsection
