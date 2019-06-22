@extends('layouts.layout')


@section('content')


<div class="container section  animated fadeIn slower">
    <div class="info-misreservas">
        
        @if(session('QR'))
        
        <h3>Estado Reserva</h3>
        <img src="{{session('QR')}}">  
        
        @else        
        <h4>No existe reserva</h4>
        @endif

    </div>
    <div class="input-field s12 menu-reser">
        <a href="{{route('reserva')}}" class="boton"><i class="fas fa-qrcode"></i> <span>Generar Reserva</span> </a>



        <a href="" class="boton"><i class="fas fa-search"></i> <span>Mostrar QR</span> </a>
        <a href="#" class="boton"><i class="fas fa-money-check-alt"></i> <span>Pagar Servicio</span> </a>
    </div>
</div>
@endsection

