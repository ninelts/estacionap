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
<div class="animated fadeIn">
    <div>
        <h4>Seleccione Tipo Reserva</h4>
        <div class=" s12 menu-reser">
            <a href="{{route('QR')}}" class="boton" ><i class="fas fa-qrcode"></i> <span>Express</span> </a>
            <a href="#!" class="boton"><i class="fas fa-search"></i> <span>Diaria</span> </a>
            <a href="#!" class="boton"><i class="fas fa-money-check-alt"></i> <span>Mensual</span> </a>
        </div>
    </div>
</div>
<h1>hola mundo</h1>
@endsection