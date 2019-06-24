@extends('layouts.layout')
@section('content')


<div class="container section  animated fadeIn slower">

    @if(session('QR'))
    <div class="row">
    <div class="col s12 m7">
      <div class="card yellow lighten-4">
        <div class="card-image">
          <img src="{{session('QR')}}">
        </div>
        <div class="card-content">
            <p>Tipo Reserva:</p><span>Express</span>
            <p>Fecha Reserva:</p><span>24-06-2019</span>
            <p>Patente Auto:</p><span>FWBL49</span>
            <p>Nombre Conductor:</p><span>JUANITO PEREZ</span>
        </div>
      </div>
    </div>
  </div>
            
    @else
    <div class="row">
    <div class="col s12 m7">
      <div class="card yellow lighten-4">
        <div class="card-image">
          <img src="img/usuario.jpg">
          <span class="card-title blue-grey-text darken-2-text">Mi Reserva</span>
        </div>
        <div class="card-content ">
            <p>Actulmente no existen reservas asociadas a esta cuenta. 
            si desea realizar una reserva presione el siguiente enlace.</p>
        </div>
        <div class="card-action">
          <a href="{{route('reserva')}}">Generar Reserva</a>
        </div>
      </div>
    </div>
  </div>
    @endif  

</div>
@endsection