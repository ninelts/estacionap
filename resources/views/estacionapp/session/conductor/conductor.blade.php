@extends('layouts.layout')


@section('content')

        @if(session('QR'))
        <h3>Estado Reserva</h3>

        <img src="{{session('QR')}}">  
        @endif
<div class="container section  animated fadeIn slower">
    <div class="info-misreservas">
        <h4>No existe reserva</h4>
    </div>
    <div class="input-field s12 menu-reser">
        <a href="#modal1" class="boton modal-trigger" onclick="ocultarBotones()"><i class="fas fa-qrcode"></i> <span>Generar Reserva</span> </a>



        <a href="" class="boton"><i class="fas fa-search"></i> <span>Mostrar QR</span> </a>
        <a href="#" class="boton"><i class="fas fa-money-check-alt"></i> <span>Pagar Servicio</span> </a>
    </div>
</div>
<div id="modal1" class="modal animated fadeIn modal-fixed-footer">
    <div class="modal-content">
        <h4>Seleccione Tipo Reserva</h4>
        <div class="input-field s12 menu-reser-modal">
            <a href="{{route('QR')}}"    class="fas fa-qrcode"></i> <span>Express</span> </a>
            <a href="#" class="boton"><i class="fas fa-search"></i> <span>Diaria</span> </a>
            <a href="#" class="boton"><i class="fas fa-money-check-alt"></i> <span>Mensual</span> </a>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="mostrarBotones()">Volver</a>
    </div>
</div>
@endsection

