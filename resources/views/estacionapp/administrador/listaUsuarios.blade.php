@extends('layouts.admin')

@section('content')



<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.js">
</script>





<div class="container">
    <h3>Listado usuarios</h3>
    <button class="add-modal" id="btnAgregar">Agregar</button>
    <table id="tblUsers" class="striped">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="users-crud">
            @foreach ($users as $user)
            <tr class="user{{$user->id}}">
                <td>
                    {{$user->rut}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->last_name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phone}}
                </td>
                <td>
                    <button class="edit-modal" data-id="{{$user->id}}" data-name="{{$user->name}}" id="edit_user">
                        <span class=""></span> Edit
                    </button>
                    <button class="delete-modal" data-id="{{$user->id}}" data-name="{{$user->name}}" id="btnEliminar">
                        <span class=""></span> Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('pdf.users')}}" class="btn"></i> <span>Pdf</span> </a>
    <a href="{{route('xlsx.users')}}" class="btn"></i> <span>xlsx</span> </a>
</div>

<!--Agregar/Editar Modal Structure -->
<div id="modal3" class="modal">
    <div class="modal-content">
        <h4 id="userCrudModal">Agregar usuario</h4>
        <form action="" method="" id="userForm">
            <input type="hidden" name="user_id" id="user_id">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="rut" type="text" name="txtRut" class="validate" value="{{old('rut')}}">
                        <label for="rut">Rut</label>
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
                        <input id="name" type="text" name="txtNombre" class="validate" value="{{old('txtNombre')}}">
                        <label for="name">Nombre</label>
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
                        <input id="last_name" type="text" name="txtApellido" class="validate"
                            value="{{old('txtApellido')}}">
                        <label for="last_name">Apellido</label>
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
                        <input id="email" type="text" name="txtEmail" class="validate" value="{{old('email')}}">
                        <label for="correo">Correo</label>
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
                        <input id="phone" type="tel" name="txtTelefono" class="validate" value="{{old('txtTelefono')}}">
                        <label for="phone">Telefono</label>
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
                        <input id="born" type="date" name="txtNacimiento" class="validate"
                            value="{{old('txtNacimiento')}}">
                        <label for="born">Fecha Nacimiento</label>
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
                    <div class="input-field col s12">
                        <input id="password" type="password" name="txtContrasena" class="validate">
                        <label for="password">Contraseña</label>
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
        <button id="eliminarArticulo" onclick="eliminarArticulo({{$user->id}})" class="btn btn-outline btn-danger"><i
    class="fa fa-trash"></i></button>
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
/*FUNCION PARA OCULTAR MODAL CON TECLA ESC*/

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $('#tblUsers').DataTable({}); //inicializa datatable
    $(document).on('click', '.delete-modal', function() {
        var nombre = ($(this).data('name'));
        var resp = confirm("Desea eliminar a "+nombre);
        if (resp == true) {
            eliminarArticulo({{$user->id}});
            } else{

            }
        });
/*FUNCION PARA EDITAR REGISTRO*/
    $('body').on('click', '.edit-modal', function () {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        var id = ($(this).data('id'));
        alert("se envía id "+id);
        $('#userCrudModal').html("Editar Usuario");
        $('#btn-save').val("edit-user");
        $('#btn-save').html('Actualizar');
        $('#modal3').show(); //muestra modal3 EDITAR es el mismo modal
        $.ajax({
            type:'post',
            url:'/editaUsuarios',
            data:{id:id},
            success: function (data) {
                $("input[id=name]").val(data.name);
                $("input[id=password]").val(data.password);
                $("input[id=email]").val(data.email);
                $("input[id=last_name]").val(data.last_name);
                $("input[id=rut]").val(data.rut);
                $("input[id=phone]").val(data.phone);
                $("input[id=born]").val(data.born);
                $("input[id=id_user]").val(data.id);
                alert(data.id);
            },
            error: function (data) {
                console.log('Error:', data);
                alert("Ha ocurrido un error");
            }
        })
    });

    $('#btnAgregar').click(function(){
        $('#modal3').show(); //muestra modal3 AGREGAR
        $('#userCrudModal').html("Agregar Usuario");
    });

    $('#btnCancelar3').click(function(){
        $('#userForm').trigger("reset");
        $('#modal3').hide(); //oculta modal3 AGREGAR
    });
});

$('#btn-save').click(function(){
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    if ($("#userForm").length > 0) { //si los elementos del formulario > 0 valida
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        var name = $("input[id=name]").val();
        var password = $("input[id=password]").val();
        var email = $("input[id=email]").val();
        var last_name = $("input[id=last_name]").val();
        var rut = $("input[id=rut]").val();
        var phone = $("input[id=phone]").val();
        var born = $("input[id=born]").val();
        var id = $("input[id=id_user]").val();
        $.ajax({
            type:'POST',
            url:'/almacenaUsuarios',
            data:{id:id, name:name, password:password, email:email, last_name:last_name, rut:rut, phone:phone, born:born},
            success: function (data) {
                var user = '<tr class="user' + data.id + '"><td>' + data.rut + '</td><td>' + data.name + '</td><td>' + data.last_name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td>';
                user += '<td><button id="edit_user" data-id="' + data.id + '" data-name="' + data.name + '"><span class=""></span> Edit</button>';
                user += '<button id="btnEliminar" data-id="' + data.id + '" data-name="' + data.name + '" class="delete-modal"><span class=""></span>Delete</button></td></tr>'; 
                if (actionType == "create") {
                    $('#users-crud').append(user);
                } else {
                    $("#user" + data.id).replaceWith(user);
                }
                $('#userForm').trigger("reset");
                $('#modal3').hide();
                $('#btn-save').html('!Guardar Cambios');  
            },
            error: function (data) {
                console.log('Error:', data);
                alert("Ha ocurrido un error");                
            }
        });
    }
});

function eliminarArticulo(id) {
    $.ajax({
        url: '/eliminaUsuarios',
        type: 'POST',
        data:
        {
            id:id,
            _token: '{!! csrf_token() !!}',
        },
        success: function(result) {
            window.alert("Usuario eliminado exitosamente");
            $('#modal1').hide(); //oculta modal id modal1
            $(".user" + id).remove(); //elimina html(fila tr) por clase user+id
        }
    });
}

</script>
@endsection