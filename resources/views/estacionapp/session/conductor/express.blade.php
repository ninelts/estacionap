@extends('layouts.layout')


@section('content')
<a href="{{route('conductor')}}" class="back-page left"><i class="fas fa-arrow-left"></i></a> <br>
<a>número de plaza: {{$respuesta}}</a>
@endsection