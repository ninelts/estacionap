@extends('layouts.layout')
@section('content')


<div class="container section  animated fadeIn slower">

    @if(!$reserves->isEmpty())
          @foreach( $reserves as $reserve )
    <div class="row">
    <div class="col s12 m7">
      <div class="card yellow lighten-4">
        <div class="card-image">
          <img src="{{$reserve->qr_url}}">
        </div>
        <div class="card-content">
            <p>Tipo Reserva:</p><span>{{$reserve->tariffs->name_tariff}}</span>
            <p>Fecha Reserva:</p><span>{{$reserve->date_reserve}}</span>
            <p>Patente Auto:</p><span>FWBL49</span>
            <p>Nombre Conductor:</p><span>{{$reserve->users->name }} {{$reserve->users->last_name}}</span>
            <p>Estado:</p><span>{{$reserve->reservestate->name_reservestate}}</span>

        </div>
      </div>
    </div>
  </div>
            
          @endforeach
    @else
    <div class="row">
    <div class="col s12 m7">
      <div class="card yellow lighten-4">
        <div class="card-image">
          <img src="img/usuario.jpg">
        </div>

        <div class="card-content ">
            <p>Actualmente no existen reservas asociadas a esta cuenta. 
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