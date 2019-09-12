@extends('layouts.layout')

@section('content')
<div class="container section  animated fadeIn slower">
    <div class="info-misreservas">
        <h3>Estado Recinto</h3>
        <p>3 <span>Plazas disponibles</span></p>
    </div>
    <div class="input-field s12 menu-reser">
        <a href="{{route('scanner')}}" class="boton"><i class="fas fa-video"></i> <span>Scanear QR</span> </a>
        <a href="#" class="boton"><i class="fas fa-search"></i> <span>Generar Reserva</span> </a>
    </div>
</div>
@endsection

