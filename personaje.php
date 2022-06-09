<?php
session_start();

if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{
  $usuario = "";
}
$filtro="";
if(isset($_GET['p']))
$idModif=$_GET['p'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title><?php echo $idModif; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/tabla.css">


</head>

<body>
    <header>
        <div id="bloq">
            <a href="home"><img class="logo" src="./assets/images/logo.png"></a>
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="home">Inicio</a></li>
                <li><a class="seleccionado" href="personajes">Personajes</a></li>
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

<?php

require("panelAdmin/Personaje.php");

if(isset($_GET['p']))
$idModif=$_GET['p'];


$fila=Personaje::devolver_nombre($idModif);
$nombreP=$fila["nombre"];
$tipoP=$fila["tipo"];
$afiliacionP=$fila["afiliacion"];
$descripcionP=$fila["descripcion"];
$imagenP=$fila["imagen"];




?>

<table>
    <tr><td align="center" colspan="2"><img style='box-shadow:rgba(0, 0, 0, 0.5) 3px 3px 10px 0px;' width="380px" src="assets/images/personajes/<?php echo $imagenP ?>"></td></tr>		
    <tr><td align="right">NOMBRE:</td><td align="left"><span><b><?php echo $nombreP?></b></span></td></tr>
    <tr><td align="right">TIPO:</td><td align="left"><span><b><?php echo $tipoP?></b></span></td></tr>
    <tr><td align="right">AFILIACION:</td><td align="left"><span><b><?php echo $afiliacionP?></b></span></td></tr>
    <tr><td align="right">DESCRIPCION:</td><td align="left"><span><b><?php echo $descripcionP?></b></span></td></tr>
</table>



</main>


  <footer>
    <p>&copyTodo Marvel 2022</p>
    <a href="#">Politica de privacidad y cookies</a><br>
    <div class="sociales">
      <a class="fa fa-facebook" href="facebook.com"></a>
      <a class="fa fa-twitter" href="twitter.com"></a>
      <a class="fa fa-envelope" href="alexdavomar@gmail.com"></a>
      <a class="fa fa-instagram" href="instagram.com"></a>
    </div>
  </footer>

</body>

</html>