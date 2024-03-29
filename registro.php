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
    <title>Crear cuenta</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/formularios.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="assets/jquery-3.6.0.min.js"></script>
    <script src="assets/js/validarRegistro.js"></script>
</head>


<?php
include("assets/clases/usuarios.php");

$nombre="";
$usu="";
$email="";
$contraseña="";
$fechaN="";
$avatar="assets/images/default.png";

$msg="";

if(isset($_POST["login"])){
  $nombre=$_POST["nombre"];
  $usu=$_POST["usuario"];
  $email=$_POST["email"];
  $contraseña=$_POST["password"];
  $fechaN=$_POST["fechaN"];


//

    $res=Usuario::crearCuenta($email,$usu,$contraseña,$nombre,$fechaN,$avatar);
        if ($res!=0){
            $_SESSION["usuario"]=$us;
            ?>
            <script>
                              window.location.reload

            </script>
            <?php
        }
        else{
            session_destroy();
            ?>
            <script>
                window.location.assign("http://localhost/Marvel/TodoMarvel/login")

            </script>
            <?php
        }
}
?>
<body>
<header>
        <div id="bloq">
            <a href="index.php"><img class="logo" src="./assets/images/logo.png"></a>
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="home">Inicio</a></li>
                <li><a href="personajes">Personajes</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <li><a href="blog">Blog</a></li>
            </ul>
        </div>
    </header>
    <main>
<div class="container">
      <div class="wrapper">
        <div class="title"><span>Registrate!</span></div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
          </div>
          <div class="row">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="contraseña1" placeholder="Contraseña" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password2" id="contraseña2" placeholder="Repetir Contraseña" required>
          </div>
          <div class="row">
            <i class="fas fa-calendar"></i>
            <input type="date" name="fechaN" id="fecha" placeholder="Fecha de Nacimiento" required>
          </div>
          <div class="row button">
            <input type="submit" value="Crear cuenta" name="login">
          </div>
          <div class="signup-link">Ya eres miembro? <a href="login">Inicia sesión!</a><br>
          <span id="error-password" style="color:red;font-size:0.75rem;"></span>
          <p style="text-align:center;text-decoration:underline;"><?php if(!empty($error)){ echo $error;}?></p></div>
        </form>
      </div>
    </div>
    </main>

<?php
require("layout/footer.php");
?>