<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Smart-Parking</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald|Port+Lligat+Sans" rel="stylesheet">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="animated fadeIn slower">
 @if(session('alert'))
<h1>{{session('alert')}} </h1>
@endif 

@if(session('status'))
<h1>{{session('status')}}</h1>
@endif


  <div id="cabecera">
    <div class="video">

      <video src="video/bg-login-movil.mp4" autoplay loop muted playsinline></video>
    </div>

    <div class="botones">
      <div class="logo">
        <img class="responsive-img img-logo" src="img/icono-512x512-2.png" alt="">
      </div>
      <a href="{{route('login')}}" class="boton inicio waves-effect waves-light">Iniciar Sesión</a>
      <a href="{{route('registro')}}" class="boton">Registrarse</a>
    </div>
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/instascan.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems);
    });
  </script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <!--   <script src="https://www.google-analytics.com/analytics.js" async defer></script> -->
</body>

</html>


















