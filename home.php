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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <script src="assets/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

    	<!-- Add fancyBox -->
      <link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
	
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
	<script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
	
	<link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
	<script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
  <script src="./assets/js/fancybox.js"></script>



</head>

<body>
    <header>
        <div id="bloq">
            <a href="home"><img class="logo" src="./assets/images/logo.png"></a>
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a class="seleccionado" href="#">Inicio</a></li>
                <li><a href="personajes">Personajes</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <li><a href="blog">Blog</a></li>
                <?php
                if($usuario==="admin") echo '<li><a href="panelAdmin/index.php">Admin</a></li>';
                if($usuario==="") echo '<li><a href="login">Login</a></li>';
                if($usuario!="" && $usuario != "admin") echo"<li>$usuario</li>"
                ?>
            </ul>
        </div>
    </header>
    
  <main>



    

    <h2 class="tit"><a href="personajes">ÚLTIMOS PERSONAJES</a></h2>
    <div id="imagenes">
    <?php

require("panelAdmin/Personaje.php");
$inicio=0;
$cuantos=4;
$filas=Personaje::devolver_filas_ventanaID($cuantos,$inicio);


$rutaImagenes="../assets/images/personajes/";
$cont=2;
foreach($filas as $fila){ 

   echo "<section><div id='servs'>";
   echo "<img src='assets/images/personajes/{$fila['imagen']}' alt='{$fila['nombre']}'>";
   echo '<div id="text-bloq">';
   echo "<a href='personaje?p={$fila['nombre']}' target=_blank><h3>{$fila['nombre']}</h3></a>";
   echo "<span>{$fila['afiliacion']} - {$fila['tipo']}</span><br><br>";
   echo "<p>{$fila['descripcion']}</p></div></div></section>";
   $cont++;
   
}

?>

    
    </div>

    <h2 class="tit"><a href="#">GALERIA DE IMAGENES</a></h2>
    <div id="wallpapers">
      <div id="galeria">
          <a href="assets/images/galeria/wallpaperDoctorStrange.jpg" rel="galeria" title="Doctor Strange">
              <img src="assets/images/galeria/wallpaperDoctorStrange.jpg" alt="Doctor Strange"/></a>
          <a href="assets/images/galeria/wallpaperSpiderman.jpg" rel="galeria" title="Spiderman No Way Home">
              <img src="assets/images/galeria/wallpaperSpiderman.jpg" alt="Spiderman No Way Home"/></a>
          <a href="assets/images/galeria/wallpaperMoonKnight.png" rel="galeria" title="Moon Knight">
              <img src="assets/images/galeria/wallpaperMoonKnight.png" alt="Moon Knight"/></a>
          <a href="assets/images/galeria/wallpaperLoki.jpg" rel="galeria" title="Loki">
              <img src="assets/images/galeria/wallpaperLoki.jpg" alt="Loki"/></a>
          <a href="assets/images/galeria/wallpaperDaredevil.jpg" rel="galeria" title="Daredevil">
              <img src="assets/images/galeria/wallpaperDaredevil.jpg" alt="Daredevil"/></a>
          <a href="assets/images/galeria/wallpaperHawkeye.jpg" rel="galeria" title="Hawkeye">
              <img src="assets/images/galeria/wallpaperHawkeye.jpg" alt="Hawkeye"/></a>
      </div>
    </div>
    <br>


  </main>


  <footer>
    <p>&copyTodo Marvel 2022</p>
    <a href="#">Politica de privacidad y cookies</a><br>
    <div class="sociales">
      <a class="fa fa-facebook" href="facebook.com"></a>
      <a class="fa fa-twitter" href="twitter.com"></a>
      <a class="fa fa-envelope" href="mailto:alexdavomar@gmail.com"></a>
      <a class="fa fa-instagram" href="instagram.com"></a>
    </div>
  </footer>

</body>

</html>