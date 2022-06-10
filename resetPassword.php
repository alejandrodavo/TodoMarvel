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
  <title>Recuperar contraseña</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
  <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/formularios.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>


</head>

<?php
include("assets/clases/usuarios.php");

$mail="";
$usu="";
$fechaN="";

$msg="";

if(isset($_POST["recuperar"])){
    $mail=$_POST["email"];
    $usu=$_POST["usuario"];
    $fechaN=$_POST["fechaN"];

    $res=Usuario::recuperarContraseña($usu,$mail,$fechaN);
    if ($res!=""){
      if($res!="ERROR")
        $msg="Contraseña: <u>$res</u>";
      else
      $msg="<u>Credenciales incorrectas.</u>";
    }
    else{
        $msg = "Credenciales incorrectas.";
        session_destroy();
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
          <li><a href="servicios">Servicios</a></li>
          <li><a href="contacto">Contacto</a></li>
          <li><a href="login">Login</a></li>
        </ul>
    </div>
</header>

<main>

<div class="container">
      <div class="wrapper">
        <div class="title"><span>Recuperar Contraseña</span></div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuario" required <?php if(isset($_POST['usuario'])) echo 'value="'.$_POST['usuario'].'"' ?>>
          </div>
          <div class="row">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Email" required <?php if(isset($_POST['email'])) echo 'value="'.$_POST['email'].'"' ?>>
          </div>
          <div class="row">
            <i class="fas fa-calendar"></i>
            <input type="date" name="fechaN" placeholder="Fecha de Nacimiento" required <?php if(isset($_POST['fechaN'])) echo 'value="'.$_POST['fechaN'].'"' ?> >
          </div>
          <div class="row button">
            <input type="submit" value="Recuperar contraseña" name="recuperar">
          </div>
          <p style="text-align:center;"><?php if(!empty($msg)){ echo $msg;}?></p>
          <div class="signup-link"><a href="home">Volver</a></div>
        </form>
      </div>
</div>
</main>
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
