<?php
session_start();

if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head>


<?php

$msg="";
$fotodef="assets/images/avatar/default.png";
$errores="";
if(isset($_POST['verFoto'])){
    if(comprobarDatos($errores)){
        $usr=new Usuario($_POST['nombre'],$_POST['pwd'],"");
        $foto=$usr->dameFotoUsuario();
        if ($foto!=-1){
            $fotodef=$foto;
        }
        else /*usuario no existe con ese PWD*/
            $errores.="Usuario o Pwd incorrectos";	
    }
}	



	$fotodef="assets/images/avatar/default.png";
	if (isset($_SESSION["usuario"])){
		$fotodef="assets/images/avatar/".$_SESSION["usuario"].".png";
	}
    if(isset($_POST["logout"])){
        session_destroy();
        ?><script>window.location.assign("http://localhost/Marvel/TodoMarvel/home")</script><?php
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
                <li><a href="blog">Blog</a></li>
                <?php
                if($usuario==="admin") echo '<li><a href="panel">Admin</a></li>';
                if($usuario==="") echo '<li><a href="login">Login</a></li>';
                if($usuario!="" && $usuario != "admin") echo"<li><a class='seleccionado' href='perfil?usuario=$usuario'>$usuario</a></li>"
                ?>
            </ul>



        </div>
    </header>
    <main>
    <div class="usuario">
            <img src="<?php echo $fotodef ?>" alt="Usuario" width="75" />
            <h3>Bienvenido <?php echo $_SESSION["usuario"] ?>!</h3>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <input type="submit" value="Cerrar sesión" name="logout">
            </form>
    </div>
    </main>

<?php
    }else{
  $usuario = "";

  require("layout/header.php");
  echo "<div style='margin-top:15%;'>
            <h1 style='text-align:center'>Debes <a style='text-decoration:underline;color:black' href='login'>iniciar sesión</a> para ver el contenido</h1>
        </div";
}

?>