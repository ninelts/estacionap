@extends('layouts.layout')


@section('content')
<a href="{{route('conductor')}}" class="back-page left"><i class="fas fa-arrow-left"></i></a>
<h1>Lista de plazas</h1>
<form action="{{route('confdiaria')}}" method="POST">
    <table class="">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Estado</th>
                <th>Seccion</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plazas as $plaza)
            <tr>
                <td>{{ $plaza->id_seat }}</td>
                <td>
                    @if($plaza->state_seat == 0)
                    Disponible
                    @else
                    Ocupado
                    @endif
                </td>
                <td>
                    @if($plaza->id_seatsection == 0)
                    Fondo
                    @else
                    @if($plaza->id_seatsection == 1)
                    Izquierda
                    @else
                    Derecha
                    @endif
                    @endif
                </td>
                <td>
                    <input id="fecha_reserva" type="date" name="dateFechaReserva" class="validate">
                    <label for="fecha_reserva">Fecha Reserva</label>
                </td>
                <td><input class="boton btn-registro" type="submit" value="Reservar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection