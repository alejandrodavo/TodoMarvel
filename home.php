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
                <li><a href="personaje">Personajes</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <li><a href="contacto">Contacto</a></li>
                <li><a href="blog">Blog</a></li>
                <?php
                if($usuario==="admin") echo '<li><a href="panelAdmin/index.php">Admin</a></li>';
                if($usuario==="") echo '<li><a href="login">Login</a></li>';
                if($usuario!="" && $usuario != "admin") echo"<li><a href='perfil?usuario=$usuario'>$usuario</a></li>"
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
   echo "<a href='personaje?p={$fila['id_personaje']}' target=_blank><h3>{$fila['nombre']}</h3></a>";
   echo "<span>{$fila['afiliacion']} - {$fila['tipo']}</span><br><br>";
   echo "<p>{$fila['descripcion']}</p></div></div></section>";
   //echo "<td data-label='ID Personaje'>".$fila['id_personaje']."</td><td data-label='Nombre'>".$fila['nombre']."</td><td data-label='Tipo'>".$fila['tipo']."</td><td data-label='Afiliacion'>".$fila['afiliacion']."</td><td data-label='Descripcion'>".
   //$fila['descripcion']."<td data-label='Imagen'><img style='border-radius:100%;box-shadow:rgba(0, 0, 0, 0.5) 3px 3px 10px 0px;' height='40px' width='40px' src='$rutaImagenes".$fila['imagen']."'></td>";
   //echo "<td data-label='Borrar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=pPerB&id=".$fila['id_personaje']."&n=".$fila['nombre']."&img=".$fila['imagen']."'>
  // <img height='30px' width='30px' src='images/papelera.png'></a></td>";
   //echo "<td data-label='Modificar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=pPerM&id=".$fila['id_personaje']."&n=".$fila['nombre']."&img=".$fila['imagen']."'>
   //<img height='30px' width='30px' src='images/edit.png'></a></td>";
   //echo "</tr>";
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

  <h2 class="tit"><a href="contacto">CONTACTO</a></h2>


  <form action="">

    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" class="field" required=”true” placeholder="Tu nombre"><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" class="field" required=”true” placeholder="Email"><br>

    <label for="edad">Edad</label><br>
    <input type="text" name="edad" class="field" required=”true” placeholder="Tu edad"><br>

    <label for="telefono">Teléfono</label><br>
    <input pattern="{1,9}" type="tel" name="telefono" class="field" required=”true” placeholder="Tu número de telefono"><br>

    <label for="mensaje">Mensaje</label><br>
    <textarea name="mensaje"class="field" required=”true” placeholder="Mensaje"></textarea><br>

    <label>Acepta Política de Privacidad </label>
    <input type="checkbox" id="privacidad" value="Politica_Privacidad" required=”true”>
    <br>

    <label>Acepta Política de Cookies </label>
    <input type="checkbox" id="cookies" value="Politica_Cookies" required=”true”>
    <br>
    



    <p class="centrar">
    <input type="submit" class="boton" value="Enviar"/>
    </p>
    


  </form>

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