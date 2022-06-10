<?php
session_start();

if(!isset($_SESSION["usuario"])){
?>
<script>window.location.assign("http://localhost/Marvel/TodoMarvel/login")</script>
<?php
}else{
  $usuario = $_SESSION["usuario"];


?>
  



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex" />
  <title>Pedidos</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
  <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/formulario-pedidos.css">
  <script src="assets/jquery-3.6.0.min.js"></script>
  <script src="assets/js/apiMarvel.js"></script>
  <script src="assets/js/validarEventListener.js"></script>


</head>

<body>
  

  <header>
    <div id="bloq">
    <a href="index.php"><img class="logo" src="./assets/images/logo.png"></a>
        <input type="checkbox" id="hamburguesa">
        <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
        <ul class="menu">
                <li><a href="home">Inicio</a></li>
                <li><a href="personajes">Personajes</a></li>
                <li><a class="seleccionado" href="pedidos">Pedidos</a></li>
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








  </main>
  <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" id="contact_form" class="contact-form contact-grid">
    
    <div class="form-field pedido">
      <label class="label" for="pedido">Pedido</label>
      <input onmouseover="ActivaFoco(pedidoInput)" onmouseout="quitaFoco(pedidoInput)" list="pedidos" name="pedido" id="pedidoInput">
        <datalist id="pedidos">
        </datalist>
    </div>
      
    <div class="form-field subject">
      <label class="label">Tipo</label>
      <select onmouseover="ActivaFoco(tipo)" onmouseout="quitaFoco(tipo)" name="tipo" id="tipo" form="contact_form" required>
        <option value="Comic" selected>Comic</option>
        <option value="Pelicula">Pelicula</option>
      </select>
    </div>
      
    <div class="form-field comment-box">
      <label class="label">Comentario</label>
      <textarea onmouseover="ActivaFoco(message)" onmouseout="quitaFoco(message)" name="comentario" id="message" maxlenght="200"></textarea>
    </div>
    
    <div class="submit-button">
      <button id="submit-btn" class="btn" type="submit" name="pedir">CREAR PEDIDO</button>
      <span id="error"></span>

    </div>
      
  </form>
  
  
  

  

  <footer>
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

<?php

}


require("pedidos copy.php");



$username=$_SESSION["usuario"];
$pedido="";
$tipo="";
$comentario="";
$fecha=date("Y-m-d");
$estado="Enviado";

if (isset($_POST['pedir'])){
	$pedido=$_POST["pedido"];
	$tipo=$_POST["tipo"];
	$comentario=$_POST["comentario"];

  $pedidoN = new Pedido(null,null, $username, $pedido, $tipo, $comentario, $fecha, $estado);
  $conexion = conectarBD();
  $res=$pedidoN->insertar();
  if($res>0)
    echo "<br/>$res Pedido correctamente";
  else
    echo "<br/>Fallo al crear pedido";
}
  ?>