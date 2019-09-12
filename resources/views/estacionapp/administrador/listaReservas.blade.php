@extends('layouts.admin')
@section('content')

{{--debe ir, si no, no pasa ná, aun que lo traiga desde el layout admin, por que lo ubica después de los demás script--}}

<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>






<div class="container">
    <h3>Reservas</h3>
    <table id="tblReserves" class="cell-border compact stripe">
        <thead>
            <tr>
                <th>Id</th>
                <th>date_reserve</th>
                <th>id_tariff</th>
                <th>id_user</th>
                <th>id_reservetype</th>
                <th>id_qrcode</th>
                <th>id_seat</th>
                <th>id_reservestate</th>
                <th>qr_url</th>
                <th>expiration_reserve</th>
                <th>activate_reserve</th>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody id="reserves-crud">
            @foreach ($reserves as $reserve)
            <tr class="reserve{{$reserve->id_reserve}}">
                <td>{{ $reserve->id_reserve  }}</td>
                <td>{{ $reserve->date_reserve }}</td>
                <td>{{ $reserve->id_tariff }}</td>
                <td>{{ $reserve->id_user }}</td>
                <td>{{ $reserve->id_reservetype }}</td>
                <td>{{ $reserve->id_qrcode }}</td>
                <td>{{ $reserve->id_seat }}</td>
                <td>{{ $reserve->id_reservestate }}</td>
                <td>{{ $reserve->qr_url }}</td>
                <td>{{ $reserve->expiration_reserve }}</td>
                <td>{{ $reserve->activate_reserve }}</td>
                <td>
                    <i id="edit_reserve" class="edit-modal material-icons" style="color:#F9CC01;"
                        data-id="{{$reserve->id_reserve}}">
                        create
                    </i>
                    <i id="btnEliminar" class="delete-modal material-icons" style="color:#E2676D;"
                        data-id="{{$reserve->id_reserve}}">
                        delete_sweep
                    </i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('pdf.reserves')}}" class="btn"></i> <span>Pdf</span> </a>
    <a href="{{route('xlsx.reserves')}}" class="btn"></i> <span>xlsx</span> </a>
</div>
<div class="fixed-action-btn direction-left">
    <a class="add-modal btn-floating btn-large waves-effect waves-light red" id="btnAgregar">
        <i class="material-icons">add</i>
    </a>
</div>


<!--Agregar/Editar Modal Structure -->
<div id="modal3" class="modal">
    <div class="modal-content">
        <h4 id="reserveCrudModal">Agregar usuario</h4>
        <form action="" method="" id="reserveForm">
            {{--             <input type="hidden" name="reserve_id" id="reserve_id">
 --}} <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="id_reserve" type="text" name="txtReserveId" class="validate" value="{{old('rut')}}" disabled>
                        <label for="id_reserve">Reserva N°</label>
                        @if($errors->get('txtRut'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtRut') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="date_reserve" type="datetime-local" name="txtFechaReserva" class="validate"
                            value="{{old('txtNombre')}}">
                        <label for="date_reserve">Fecha Reserva</label>
                        @if($errors->get('txtNombre'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtNombre') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="id_tariff" type="text" name="txtTarifa" class="validate"
                            value="{{old('txtApellido')}}">
                        <label for="id_tariff">Tarifa</label>
                        @if($errors->get('txtApellido'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtApellido') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="id_user" type="text" name="txtUsuario" class="validate" value="{{old('email')}}">
                        <label for="id_user">Usuario</label>
                        @if($errors->get('txtEmail'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtEmail') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="id_reservetype" type="tel" name="txtTipoReserva" class="validate"
                            value="{{old('txtTelefono')}}">
                        <label for="id_reservetype">Tipo Reserva</label>
                        @if($errors->get('txtTelefono'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtTelefono') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="id_qrcode" type="datetime-local" name="txtQrCode" class="validate"
                            value="{{old('txtNacimiento')}}">
                        <label for="id_qrcode">QR</label>
                        @if($errors->get('txtNacimiento'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtNacimiento') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="id_seat" type="tel" name="txtPlaza" class="validate"
                            value="{{old('txtTelefono')}}">
                        <label for="id_seat">Estado Reserva</label>
                        @if($errors->get('txtTelefono'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtTelefono') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                            <input id="id_reservestate" type="tel" name="txtEstadoReserva" class="validate"
                                value="{{old('txtTelefono')}}">
                            <label for="id_reservestate">Estado Reserva</label>
                            @if($errors->get('txtTelefono'))
                            <div class="card-error red lighten-2">
                                @foreach ($errors->get('txtTelefono') as $error)
                                <div class="card-content white-text">
                                    <p class="error-form-registroUsu">{{ $error }}</p>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="qr_url" type="text" name="txtQrUrl" class="validate">
                        <label for="qr_url">Directorio QR</label>
                        @if($errors->get('txtContrasena'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtContrasena') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="expiration_reserve" type="date" name="txtExpiracionReserva" class="validate">
                        <label for="expiration_reserve">Expiración Reserva</label>
                        @if($errors->get('txtTelefono'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtTelefono') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="activate_reserve" type="datetime-local" name="txtActivacionReserva" class="validate"
                            value="{{old('txtNacimiento')}}">
                        <label for="activate_reserve">Activación Reserva</label>
                        @if($errors->get('txtNacimiento'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtNacimiento') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
        </form>
    </div>
    <div class="modal-footer" id="modal-footerc">
        <button id="btn-save" type="button" class="waves-effect waves-teal btn-flat" value="create">
            <i class="fa fa-plus"></i><span>Guardar cambios</span>
        </button>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" id="btnCancelar3">Cancelar</a>
    </div>
</div>
<!-- Agregar/Editar Modal Structure -->


<!--Eliminar Modal Structure -->
{{-- <div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Eliminar</h4>
        <p>¿Está seguro que desea eliminar a
            <input type="text" name="" id="dname" class="dname" disabled>
        </p>
    </div>
    <div class="modal-footer" id="modal-footerd">
        <button id="eliminarReserva" onclick="eliminarReserva({{$reserve->id}})" class="btn btn-outline
btn-danger"><i class="fa fa-trash"></i></button>
<a href="#!" class="modal-close waves-effect waves-green btn-flat" id="btnCancelar">Cancelar</a>
</div>
</div> --}}
<!-- Eliminar Modal Structure -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}

<script type="text/javascript">
    $(document).ready(function() {
    
    /*FUNCION PARA OCULTAR MODAL CON TECLA ESC*/
    window.addEventListener("keyup",function(e){
        if(e.keyCode==27) {
            document.getElementById("modal3").style.display="none";
        }
    });

    /*OBTENER DESDE CABECERA EL TOKEN CSRF*/
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    /* INICIALIZAR DATATABLE */
/*     $('#tblReserves').DataTable({});
 */
    /* BOTÓN ELIMINAR USUARIO */
    $(document).on('click', '.delete-modal', function() {
        var id = ($(this).data('id'));
        var resp = confirm("Desea eliminar a id "+ id);
        if (resp == true) {
            eliminarReserva(id);
            } else{
            }
        });

    /*CARGAR REGISTROS PARA DESPUÉS EDITAR*/
    $('body').on('click', '.edit-modal', function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var id = ($(this).data('id'));
        alert("se envía id "+id);
        $('#reserveCrudModal').html("Editar Reserva");
        $('#btn-save').val("edit-reserve");
        $('#btn-save').html('Actualizar');
        $('#modal3').show(); //muestra modal3 EDITAR es el mismo modal
        $.ajax({
            type:'post',
            url:'/editaReservas',
            data:{id:id},
            success: function (data) {
                $("input[id=id_reserve]").val(data.id_reserve);
                $("input[id=date_reserve]").val(data.date_reserve);
                $("input[id=id_tariff]").val(data.id_tariff);
                $("input[id=id_user]").val(data.id_user);
                $("input[id=id_reservetype]").val(data.id_reservetype);
                $("input[id=id_qrcode]").val(data.id_qrcode);
                $("input[id=id_seat]").val(data.id_seat);
                $("input[id=id_reservestate]").val(data.id_reservestate);
                $("input[id=qr_url]").val(data.qr_url);
                $("input[id=expiration_reserve]").val(data.expiration_reserve);
                $("input[id=activate_reserve]").val(data.activate_reserve);
                alert(data.id_reserve);
            },
            error: function (data) {
                console.log('Error:', data);
                alert("Ha ocurrido un error"+data);
            }
        })
    });

    /* ABRE MODAL PARA CREAR NUEVO USUARIO */
    $('#btnAgregar').click(function(){
        $('#modal3').show(); //muestra modal3 AGREGAR
        $('#reserveCrudModal').html("Agregar Reserva");
    });

    /* CIERRA MODAL DE CREACIÓN/EDICIÓN USUARIO */
    $('#btnCancelar3').click(function(){
        $('#reserveForm').trigger("reset");
        $('#btn-save').val("create");
        $('#btn-save').html('Agregar Reserva');
        $('#modal3').hide(); //oculta modal3 AGREGAR
    });
});



/* EDICIÓN O AGREGACIÓN DE USUARIO SEGÚN VALOR DE BTN-SAVE */
    $('#btn-save').click(function(){
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        if ($("#reserveForm").length > 0) { //si los elementos del formulario > 0 valida
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');
            var date_reserve = $("input[id=date_reserve]").val();
            var id_tariff = $("input[id=id_tariff]").val();
            var id_user = $("input[id=id_user]").val();
            var id_reservetype = $("input[id=id_reservetype]").val();
            var id_qrcode = $("input[id=id_qrcode]").val();
            var id_seat = $("input[id=id_seat]").val();
            var id_reservestate = $("input[id=id_reservestate]").val();
            var qr_url = $("input[id=qr_url]").val();
            var expiration_reserve = $("input[id=expiration_reserve]").val();
            var activate_reserve = $("input[id=activate_reserve]").val();
            var id = $("input[id=reserve_id]").val();
            if (actionType == "create") {
                $.ajax({
                type:'POST',
                url:'/almacenaReservas',
                data:{id:id, name:name, password:password, email:email, last_name:last_name, rut:rut, phone:phone, born:born},
                success: function (data) {
                    var reserve = '<tr class="reserve' + data.id + '"><td>' + data.rut + '</td><td>' + data.name + '</td><td>' + data.last_name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td>';
                    reserve += '<td><i id="edit_reserve" class="edit-modal material-icons" style="color:#F9CC01;" data-id="' + data.id + '" data-name="' + data.name + '">create</i>';
                    reserve += '<i id="btnEliminar" class="delete-modal material-icons" style="color:#E2676D;" data-id="' + data.id + '" data-name="' + data.name + '">delete_sweep</i></td></tr>';
                    $('#reserves-crud').append(reserve);
                    $('#reserveForm').trigger("reset");
                    $('#modal3').hide();
                    $('#btn-save').html('!Guardar Cambios');  
                },
                error: function (data) {
                    console.log('Error:', data);
                    alert("Ha ocurrido un error agregar"+data);
                }
            });
        }else {
            $.ajax({
            type:'POST',
            url:'/edicionUsuario',
            data:{id:id, name:name, password:password, email:email, last_name:last_name, rut:rut, phone:phone, born:born},
            success: function (data) {
                var reserve = '<tr class="reserve' + data.id + '"><td>' + data.rut + '</td><td>' + data.name + '</td><td>' + data.last_name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td>';
                    reserve += '<td><i id="edit_reserve" class="edit-modal material-icons" style="color:#F9CC01;" data-id="' + data.id + '" data-name="' + data.name + '">create</i>';
                    reserve += '<i id="btnEliminar" class="delete-modal material-icons" style="color:#E2676D;" data-id="' + data.id + '" data-name="' + data.name + '">delete_sweep</i></td></tr>';
                    alert(reserve);
                    $('.reserve' + data.id).replaceWith(reserve);
                    $('#reserveForm').trigger("reset");
                    $('#modal3').hide();
                    $('#btn-save').html('!Guardar Cambios');  
                },
                error: function (data) {
                    console.log('Error:', data);
                    alert("Ha ocurrido un error edit"+data);
                }
            });
        }
    }
});
/* ELIMINAR USUARIO */
function eliminarReserva(id) {
    $.ajax({
        url: '/eliminaReservas',
        type: 'POST',
        data:
        {
            id:id,
            _token: '{!! csrf_token() !!}',
        },
        success: function(result) {
            alert("Reserva eliminada exitosamente");
            $('#modal1').hide(); //oculta modal id modal1
            $('.reserve' + id).remove(); //elimina html(fila tr) por clase reserve+id
        }
    });
}
</script>
@endsection