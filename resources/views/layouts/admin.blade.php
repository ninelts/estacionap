<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminFlex</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Port+Lligat+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/admin.css">
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
                    <div class="cerrar caja" >
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
                            <a href="#">
                                <i class="fas fa-address-book"></i>
                                Clientes
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
                                <i class="fas fa-chart-line"></i>
                                Ventas
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
                                <i class="fas fa-box"></i>
                                Inventario
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
                        </li>
                    </ul>
                </div>
        </aside>
@yield('content');

<script src="js/admin.js" async defer></script>
<script src="https://kit.fontawesome.com/80c7d27d36.js"></script>
</body>
</html>