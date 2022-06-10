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
    <title>Login</title>
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
    <script src="assets/js/validarLogin.js"></script>


</head>


<?php
include("assets/clases/usuarios.php");

$us="";
$ps="";

if(isset($_POST["login"])){
    $us=$_POST["usuario"];
    $ps=$_POST["password"];

    $res=Usuario::login($us,$ps);
        if ($res!=0){
            $_SESSION["usuario"]=$us;
            ?>
            <script>
                window.location.assign("http://localhost/Marvel/TodoMarvel/home")
            </script>
            <?php
        }
        else{
            $error = "Usuario o Contraseña incorrectos";
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
                <li><a href="personajes">Personajes</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <li><a href="contacto">Contacto</a></li>
                <li><a href="blog">Blog</a></li>
                <li><a class="seleccionado" href="login">Login</a></li>
            </ul>
        </div>
    </header>
    <main>

<div class="container">
      <div class="wrapper">
        <div class="title"><span>Iniciar Sesión</span></div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuario" id="usuario" <?php if(isset($_POST['usuario'])) echo 'value="'.$_POST['usuario'].'"' ?>> 
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Contraseña" id="contraseña"><br>
            <span id="error-password" style="color:red;font-size:0.75rem;"></span>
            <br><input style="margin:0;padding:0;margin-top:5%;width:auto;height:auto;" type="checkbox" id="recordar-contraseña" name="recordar-contraseña"><label for="recordar-contraseña">&nbsp&nbspRecordarme</label><br><br>
          </div>
          <br><br>
          <div class="pass" style="margin-top:20px"><a href="resetPassword">Has olvidado la contraseña?</a></div>
          <div class="row button">
            <input type="submit" value="Login" name="login" id="iniciar-sesion">
          </div>
          <p style="text-align:center;text-decoration:underline;"><?php if(!empty($error)){ echo $error;}?></p>
          <div class="signup-link">No eres miembro? <a href="registro">Registrate ahora!</a></div>
        </form>
      </div>
    </div>
    </main>

<?php
require("layout/footer.php")
?>
</body>
