@extends('layouts.layout')


@section('content')


<div class="container section  animated fadeIn slower">

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
@endsection