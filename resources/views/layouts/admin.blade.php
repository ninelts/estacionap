<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AdminFlex</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Port+Lligat+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.css" />

    {{--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
 --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <div class="pagina">
        <header class="header">
            <div class="nombre-sitio">
                <p class="escritorio">EstacionaPP</p>
                <p class="movil">AP</p>
            </div>
            <div class="barra">
                <div class="menu-izquierdo">
                    <i class="fas fa-arrow-left"></i>
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="menu-derecho">
                    <div class="mensajes caja">
                        <a href="#">
                            <i class="fas fa-comment-alt"></i>
                            <span>20</span>
                        </a>
                    </div>
                    <div class="mensajes caja">
                        <a href="#">
                            <i class="fas fa-bell"></i>
                            <span>10</span>
                        </a>
                    </div>
                    <div class="cerrar caja">
                        <a href="{{ url('/logout') }}">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="contenedor-principal">
            <aside class="sidebar">
                <div class="usuario">
                    <img src="img/usuario.svg">
                    <p>Bienvenid@: <span>Admin</span></p>
                </div>

                <div class="menu-admin">
                    <h2>Menú de Administración</h2>
                    <ul class="menu">
                        <li>
                            <a href="{{route('administracion')}}">
                                <i class="fas fa-chart-bar"></i>
                                Recinto
                            </a>
                        </li>
                        <li>
                            <a href="{{route('listado_usuarios')}}">
                                <i class="fas fa-address-book"></i>
                                Usuarios
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('listado_usuarios_desactivados')}}">
                                        <i class="fas fa-list"></i>
                                        Inactivos
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('agregar_usuarios')}}">
                                <i class="fas fa-plus"></i>
                                Agregar Nuevo
                                </a>
                        </li> --}}
                    </ul>
                    </li>
                    <li>
                        <a href="{{route('listado_reservas')}}">
                            <i class="fas fa-calendar-alt"></i>
                            Reservas
                        </a>
                    </li>
                    <li>
                        <a {{-- href="{{route('listado_tarifas')}}" --}}>
                            <i class="fas fa-chart-line"></i>
                            Tarifas
                        </a>
                    </li>
                    {{-- <li>
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                Facturas
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-list"></i>
                                        Ver Todos
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-plus"></i>
                                        Agregar Nuevo
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>
                                Calendario
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-list"></i>
                                        Ver Todos
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-plus"></i>
                                        Agregar Nuevo
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Editar Perfil
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </aside>
            @yield('content')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="js/admin.js" async defer></script>
            <script src="https://kit.fontawesome.com/80c7d27d36.js"></script>
            <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


            {{-- lista reserva  bootstrap --}}
            {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}


</body>

</html>