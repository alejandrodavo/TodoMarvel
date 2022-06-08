<?php
session_start();
if(isset($_SESSION["usuario"]))
$usuario = $_SESSION["usuario"];
else $usuario = "";
if($usuario === "admin"){
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>Panel de Control | TodoMarvel</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="tabla.css">

</head>
<body>


    <?php 
    if(isset($_POST["salir"])){
        session_destroy();
        ?>
        <script>
            window.location.assign("http://localhost/Marvel/TodoMarvel/home")
        </script>
        <?php
    }
        ?>
    

<header>
        <div id="bloq">
            <a href="home"><img class="logo" src="../assets/images/logo.png"></a>
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="index.php?p=principal">INICIO</a></li>
                <li><a href="index.php?p=p1">USUARIOS</a></li>
                <li><a href="index.php?p=pA">PETICIONES</a></li>
                <li><a href="index.php?p=pM">PERSONAJES</a></li>
                <li><a href="../home">VOLVER</a></li>
                <li><form method="POST" action="<?php $_SERVER['PHP_SELF']?>"><input style="background-color:transparent;border:0px solid transparent;color:white;font-weight:bold;cursor:pointer;" type="submit" value="SALIR" name="salir"></form></li>
            </ul>
        </div>
    </header>


    <?php
}else{
    echo "<h1>No tienes permisos para ver esta página!</h1>";
}
?>
