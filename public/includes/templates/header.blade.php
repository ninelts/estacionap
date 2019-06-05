<nav>
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">Smart-Parking</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="sass.html">Sass</a></li>
      @auth
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
       @csrf
       <input type="submit" name="Salir" value="salir">
     </form>
      @endauth
     <li><a href="badges.html">Components</a></li>
     <li><a href="collapsible.html">JavaScript</a></li>
   </ul>
   <a href="#" data-target="slide-out" class="sidenav-trigger right"><i class="fas fa-bars"></i></a>
   <a href="#" class="back-page left"><i class="fas fa-arrow-left"></i></a>
 </div>

</nav>
<ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="../img/bg-login-movil.png">
    </div>
    <a href="#user"><img class="circle" src="../img/usuario.jpg"></a>
    <a href="#name"><span class=" name">Usuario</span></a>
    <a href="#email"><span class=" email">usuario@usuario.com</span></a>
  </div></li>
  <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
  <li><a href="#!">Second Link</a></li>
  <li><div class="divider"></div></li>
  <li><a class="subheader">Subheader</a></li>
  <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>

