@extends('layouts.layout')
@section('content')
<section class="container section animated fadeIn slower">

@if(session('status'))
    <div class="card-success green lighten-2">
        <div class="card-content">
             <h4 class="success-form-registroUsu white-text">{{session('status')}}</h4>
         </div>
     </div>
@endif

<form action="{{route('registro_auto_post')}}" method="POST">
        @csrf
        <h4>Registro Automovil</h4>
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="patente" type="text" name="txtPatente" class="validate">
                    <label for="patente">Patente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="marca_auto">
                        <!-- <option value="" disabled selected>Elija marca</option> -->
                        @foreach($marcas as $marcas1) 
                        <option value="{{$marcas1->id_marca}}"> {{$marcas1->nom_marca}}</option>
                        @endforeach
                    </select>

                    <label>Marca Auto</label>
                </div>

                <div class="input-field col s6">
                    <select name="tipo_auto">
                        
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Tipo Auto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="modelo_auto">
                        <option value="" disabled selected>Elija Modelo</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Modelo Auto</label>
                </div>
            </div>
            <div class="input-field col s12">
                <input class="boton btn-registro" type="submit" value="Finalizar">
            </div>
        </div>
    </form>
</section>
@endsection
