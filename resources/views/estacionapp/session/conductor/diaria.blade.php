@extends('layouts.layout')


@section('content')
<section class="container section animated fadeIn slower">
<h1>Lista de plazas</h1>
@if(session('status'))
    <h5 class="center">{{session('status')}}</h5>
@endif
<h5></h5>
<div class="container">
<ul class="collapsible">
            @foreach($plazas as $plaza)
    <li>
      <div class="collapsible-header"><i class="material-icons">directions_car</i>Nro Plaza {{ $plaza->id_seat }}</div>
      <div class="collapsible-body">
      <form action="{{route('cdiaria')}}" method="POST">
                @csrf
                <div class="row">
                <span class="col s6">Estado</span>
                <span class="col s6">
                    @if($plaza->state_seat == 0)
                    Disponible
                    @else
                    Ocupado
                    @endif
                </span>
                </div>
                <div class="row">
                <span class="col s6">Sector</span>
                <span class="col s6">
                    @if($plaza->id_seatsection == 0)
                    Fondo
                    @else
                    @if($plaza->id_seatsection == 1)
                    Izquierda
                    @else
                    Derecha
                    @endif
                    @endif
                </span>
                </div>
            
                <div class="row">
                    <input name="plaza[{{$plaza->id_seat}}]" type="text" style="display: none;" value='{{$plaza->id_seat}}'>
                    <input id="fecha_reserva" type="date" name="dateFechaReserva[{{$loop->iteration}}]" class="validate" >
                    <label for="fecha_reserva">Fecha Reserva</label>
                </div>
                <button class="boton-submit waves-effect waves-light" type="submit">Reservar

            </tr>
        </form>

      </div>
    </li>
  @endforeach
  </ul>
</div>
</section>
@endsection