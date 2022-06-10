<?php
session_start();

if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{
  $usuario = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex" />
  <title>Blog</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
  <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <script src="assets/jquery-3.6.0.min.js"></script>
  <script src="assets/js/animaciones.js"></script>

</head>

<body>

  <header>
    <div id="bloq">
        <a id="logotipoo" href="home"><img class="logo" src="./assets/images/logo.png"></a>
        <input type="checkbox" id="hamburguesa">
        <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
        <ul class="menu">
          <li><span style="display: none;color:white;" id="nombreAnimacion">Alejandro Davó 2DAW</span></li>
          <li id="hora"></a></li>
          <li><a href="home">Inicio</a></li>
          <li><a href="personajes">Personajes</a></li>
          <li><a href="pedidos">Pedidos</a></li>
          <li><a class="seleccionado" href="#">Blog</a></li>
          <?php
                if($usuario==="admin") echo '<li><a href="panelAdmin/index.php">Admin</a></li>';
                if($usuario==="") echo '<li><a href="login">Login</a></li>';
                if($usuario!="" && $usuario != "admin") echo"<li>$usuario</li>"
                ?>
        </ul>
    </div>
</header>

<main>

<div id="div1" style="text-align:center; color:white; display: none;">
            <span id="equis" class="cerrar">&times;</span>
            <h2 style="color: white;text-align:center">BIENVENIDO A</h2>
            <h1 style="color: white;text-align:center">TODO</h1>
            <h1 style="color: white;text-align:center">MARVEL</h1>
            
    </div>

</main>

  <footer style="margin-top:400px">
    <p>&copyTodo Marvel 2022</p>
    <a href="#">Politica de privacidad y cookies</a><br>
    <div class="sociales">
      <a class="fa fa-facebook" href="#"></a>
      <a class="fa fa-twitter" href="#"></a>
      <a class="fa fa-rss" href="#"></a>
      <a class="fa fa-envelope" href="#"></a>
      <a class="fa fa-instagram" href="#"></a>
    </div>
  </footer>
</body>
</html>
