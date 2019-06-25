@extends('layouts.layout')


@section('content')


<div class="container section  animated fadeIn slower">
    <div class="input-field s12 menu-reser">
        <a href="{{route('reserva')}}" class="boton"><i class="fas fa-qrcode"></i> <span>Generar Reserva</span> </a>



        <a href="" class="boton"><i class="fas fa-search"></i> <span>Mostrar QR</span> </a>
        <a href="#" class="boton"><i class="fas fa-money-check-alt"></i> <span>Pagar Servicio</span> </a>
    </div>
</div>
@endsection

