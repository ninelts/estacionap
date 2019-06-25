@extends('layouts.layout')


@section('content')


<div class="container section  animated fadeIn slower">
<div class="row">
<h4 class="left">Mis Datos</h4>
    <table class="">
        <thead>
          <tr>
              <th>Nombre</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td id="txtNombre">Juanito</td>
          </tr>
        </tbody>
        <thead>
          <tr>
              <th>Apellido</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td id="txtApellido">Peréz</td>
          </tr>
        </tbody>
        <thead>
          <tr>
              <th>Correo</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td id="txtCorreo">correo@correo.com</td>
          </tr>
        </tbody>
    </table>
    <div class="row" id="btnsEdicion">
    </div>
    <h4 class="left">Mis Autos</h4>
    <table class="">
        <thead>
          <tr>
              <th>Patente</th>
              <th>Marca</th>
              <th>Modelo</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>FWGR98</td>
            <td>Chevrolet</td>
            <td>Spark GT</td>
          </tr>
        </tbody>
    </table>
</div>
<div class="fixed-action-btn">
  <a class="btn-floating btn-large yellow darken-1">
    <i class="large material-icons">add</i>
  </a>
  <ul>
    <li><a class="btn-floating green" onclick="editarcampos()"><i class="material-icons">mode_edit</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">directions_car</i></a></li>
    <!-- <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">attach_file</i></a></li> -->
  </ul>
</div>
</div>
@endsection